<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Contact extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'name',
        'name_en',
        'name_tk',
        'phone',
        'faks',
        'email',
    ];
}
