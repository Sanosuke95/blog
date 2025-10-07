<?php

namespace App\Trait;

use Str;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
