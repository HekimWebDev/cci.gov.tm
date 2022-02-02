<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'phone',
        'email',
        'adress',
        'adress_en',
        'adress_tk',
        'web',
    ];
}
