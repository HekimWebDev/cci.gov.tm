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
class Parcipants extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'desc',
        'desc_en',
        'desc_tk',
    ];

}
