<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetEnc()
    {
        $youtube = env('YOUTUBE');
        self::assertEquals('chandra', $youtube);
        //assertEquals adalah fungsi untuk membandingkan dua nilai
        //jika nilai pertama dan kedua sama, maka test akan lulus
    }

    // public function testDefaultValue()
    // {
    //     $author = env('AUTHOR','chandra');
    //     self::assertEquals('false', $author);
    // }

}
