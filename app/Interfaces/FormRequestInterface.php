<?php

namespace App\Interfaces;

interface FormRequestInterface
{
    /**
     * post rules 
     *
     * @return array
     */
    public function postRule(): array;

    /**
     * post messages custom
     *
     * @return array
     */
    public function postMessage(): array;

    /**
     * update rule
     *
     * @return array
     */
    public function updateRule(): array;

    /**
     * update message custom
     *
     * @return array
     */
    public function updateMessage(): array;
}
