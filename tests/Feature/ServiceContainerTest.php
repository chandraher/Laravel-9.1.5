<?php

namespace Tests\Feature;

use App\Data\Kelas;
use App\Data\Person;
use App\Data\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDependency()
    {
        $Kelas1 = $this->app->make(Kelas::class); // memanggil kelas Kelas dari container -new kelas()
        $Kelas2 = $this->app->make(Kelas::class); // memanggil kelas Kelas dari container

        self::assertEquals("kelas fundamental", $Kelas1->info());
        self::assertEquals("kelas fundamental", $Kelas2->info());
        self::assertNotSame($Kelas1, $Kelas2); // memastikan bukan object yang sama
    }

    //binding instance constructor
    public function testBindingInstanceToContainer()
    {
        $this->app->bind(Person::class, function () { // bind instance untuk class Person memasukkan parameter
            return new Person("chandra", "tangerang");
        });

        //create object yang berbeda
        $person1 = $this->app->make(Person::class); //new person()
        $person2 = $this->app->make(Person::class); //new person()

    
        self::assertEquals("chandra", $person1->name);
        self::assertEquals("tangerang", $person2->address);
        self::assertNotSame($person1, $person2); //Memastikan object yang berbeda
    }

    //singelton create object only once
    public function testSingleton()
    {
        $this->app->singleton(Person::class, function ($app) { // bind instance untuk class Person memasukkan parameter
            return new Person("chandra", "tangerang");
        });

        //create object only once and return existing
        $person1 = $this->app->make(Person::class); //new person("chandra","tangerang")
        $person2 = $this->app->make(Person::class); //return existing

    
        self::assertEquals("chandra", $person1->name);
        self::assertEquals("chandra", $person2->name);
        self::assertSame($person1, $person2); //Memastikan object yang berbeda
    }

    public function testInstance()
    {
        $person = new Person("chandra", "tangerang");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); 
        $person2 = $this->app->make(Person::class);

        self::assertEquals("chandra", $person1->name);
        self::assertEquals("chandra", $person2->name);
        self::assertSame($person1, $person2); //Memastikan object yang berbeda
    }

    public function testDependencyInjection()
    {
        $kelas = $this->app->make(Kelas::class);
        $mahasiswa = $this->app->make(Mahasiswa::class);

        self::assertNotSame($kelas, $mahasiswa->kelas);//memast
      
    }

    public function testDependencyInjectionSame()
    {
        $this->app->singleton(Kelas::class, function () {
            return new Kelas();
        });
        $kelas = $this->app->make(Kelas::class);
        $mahasiswa = $this->app->make(Mahasiswa::class);

        self::assertSame($kelas, $mahasiswa->kelas);//memastikan object sama
      
    }

}
