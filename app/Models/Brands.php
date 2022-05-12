<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Brands extends Model
{
    use HasFactory, Translatable, Sluggable;

    protected $table = 'local_brands';

    protected $fillable = [
        'title',
        'title_en',
        'title_tk',
        'article',
        'article_en',
        'article_tk',
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

    public function getImage(): string
    {
         if (!$this->thumbnail) {
             return asset('no-image.jpg');
         }
        return asset("uploads/{$this->thumbnail}");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
