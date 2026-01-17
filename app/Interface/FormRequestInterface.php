<?php

namespace App\Interface;

interface FormRequestInterface
{
    public function store(): array;
    public function update(): array;
    public function messageStore(): array;
    public function messageUpdate(): array;
}
