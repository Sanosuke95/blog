<?php

namespace App\Interfaces;

use App\Enums\HttpCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

interface ResponseInterface
{
    /**
     * Response success
     *
     * @param JsonResource|ResourceCollection $data
     * @param string $message
     * @param HttpCode $code
     * @return JsonResponse
     */
    public function render(JsonResource|ResourceCollection $data, string $message, HttpCode $code = HttpCode::DEFAULT): JsonResponse;

    /**
     * Error response
     *
     * @param string $message
     * @param HttpCode $code
     * @return JsonResponse
     */
    public function error(string $message, HttpCode $code = HttpCode::INVALID): JsonResponse;
}
