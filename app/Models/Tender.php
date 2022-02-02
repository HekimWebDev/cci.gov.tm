<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Tender extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'title',
        'title_en',
        'title_tk',
        'desc',
        'desc_en',
        'desc_tk',
        'phone',
        'faks',
        'adress',
        'adress_en',
        'adress_tk',
        'email',
        'web',
        'organizer',
        'organizer_en',
        'organizer_tk',
        'datesingle',
    ];

    public function getTenderDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->datesingle)->format('d.m.Y');
    }
}
