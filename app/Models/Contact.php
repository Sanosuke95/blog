<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Uuid, HasFactory;
    protected $fillable = [
        'email',
        'title',
        'content'
    ];
}
