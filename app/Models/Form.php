<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'info',
        'email',
        'theme',
        'message',
    ];

}
