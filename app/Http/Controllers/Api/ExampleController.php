<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function hello()
    {
        $msg = "First test";
        return response()->json(['content' => $msg]);
    }
}
