<?php

namespace App\Models;

use App\Trait\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperContact
 */
class Contact extends Model
{
    use Uuid, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'email',
        'content',
    ];
}
