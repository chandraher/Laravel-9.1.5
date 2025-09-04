<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function helloInputGet(Request $request): string
    {
        $name = $request->input('name');
        return "hello Get " . $name;
    }

    public function helloInputPost(Request $request): string
    {
        $name = $request->input('name');
        return "hello Post " . $name;
    }

    public function helloNested(Request $request): string
    {
        $name = $request->input('name.first');
        return "hello nested " . $name;
    }

    public function helloInputPostAll(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function getInputAllProductArray(Request $request): string
    {
        $input = $request->input('product.*.name');
        return json_encode($input);
    }
}
