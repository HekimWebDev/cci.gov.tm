<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class About extends Model
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
        'thumbnail',
    ];


    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }

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

    public function getImage()
    {
        if (!$this->thumbnail) {
            return '';
        }
        return asset("uploads/{$this->thumbnail}");
    }
}
