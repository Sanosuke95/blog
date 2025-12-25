<?php

namespace App\Services;

use App\Enums\HttpCode;
use App\Interfaces\ResponseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ResponseService implements ResponseInterface
{
    /**
     * success response
     *
     * @param JsonResource|Collection $data
     * @param string $message
     * @param HttpCode $code
     * @return JsonResponse
     */
    public function render(JsonResource|ResourceCollection $data, string $message, HttpCode $code = HttpCode::DEFAULT): JsonResponse
    {
        $response = empty($data) ? ['message' => $message] : ['message' => $message, 'data' => $data];
        return response()->json($response, $code->value);
    }

    /**
     * error response
     *
     * @param string $message
     * @param HttpCode $code
     * @return JsonResponse
     */
    public function error(string $message, HttpCode $code = HttpCode::INVALID): JsonResponse
    {
        return response()->json(['message' => $message], $code->value);
    }
}
