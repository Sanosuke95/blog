<?php

namespace App\Models;

use App\Trait\Uuid;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Uuid;

    protected $fillable = [
        'title',
        'email',
        'content',
    ];
}
