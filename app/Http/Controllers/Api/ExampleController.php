<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ExampleController extends Controller
{
    public function hello(): JsonResponse
    {
        $msg = "first messgae for front-end";
        return response()->json(['data' => $msg]);
    }
}
