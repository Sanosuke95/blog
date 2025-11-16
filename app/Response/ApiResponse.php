<?php

namespace App\Response;

use App\Enum\HttpCode;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function send(array $data = [], String $message, HttpCode $code = HttpCode::SUCCESS): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }
        return response()->json($response, $code->value);
    }
}
