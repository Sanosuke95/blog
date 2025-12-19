<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function hello()
    {
        $msg = "Premier test avec le front";
        return response()->json(['msg' => $msg]);
    }
}
