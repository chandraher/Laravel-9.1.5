<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $Kelas = new Kelas();
        $Mahasiswa = new Mahasiswa($Kelas);
        console.log($Mahasiswa->namaKelas());
        self::assertEquals("kelas fundamental", $Mahasiswa->namaKelas());

    }
}
