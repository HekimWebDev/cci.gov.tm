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
class Membership extends Model
{
    use HasFactory, Translatable, Sluggable;

    protected $fillable = [
        'slug',
        'title',
        'title_en',
        'title_tk',
        'desc',
        'desc_en',
        'desc_tk',
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
                'source' => 'title'
            ]
        ];
    }
}
