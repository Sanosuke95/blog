<?php

namespace App\Interface;

use Illuminate\Http\JsonResponse;

interface ControllerInterface
{
    public function index(): JsonResponse;
    public function show(): JsonResponse;
}
