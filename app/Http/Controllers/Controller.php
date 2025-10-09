<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function renderResponse(array $data = [], string $message, int $code = 200): JsonResponse
    {
        $content = [
            'message' => $message,
        ];

        if (!empty($data)) $content['data'] = $data;

        return response()->json($content, $code);
    }
}
