<?php

namespace App\Services;

class HelloService
{
    public function hello(string $name): string
    {
        return "Hello " . $name . " from HelloService!";
    }
}
