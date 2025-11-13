<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    public function hello(string $name)
    {
        return $this->helloService->hello($name);
    }

    public function helloView(string $name)
    {
        $message = $this->helloService->hello($name);
        return view('hello', ['name' => $name, 'message' => $message]);
    }
}
