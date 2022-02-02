<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Branch extends Model
{
    use HasFactory, Translatable, Sluggable;

    protected $fillable = [
        'slug',
        'name',
        'name_en',
        'name_tk',
        'title',
        'title_en',
        'title_tk',
        'desc',
        'desc_en',
        'desc_tk',
        'phone',
        'faks',
        'email',
        'adress',
        'adress_en',
        'adress_tk',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
