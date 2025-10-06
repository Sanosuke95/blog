<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(): JsonResponse
    {
        $msg = "First cal for react front-end";
        return response()->json([
            'msg' => $msg
        ]);
    }
}
