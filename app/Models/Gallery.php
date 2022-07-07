<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Stringable;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Gallery extends Model
{
    use HasFactory, Translatable, Sluggable;

    protected $fillable = [
        'slug',
        'title',
        'title_en',
        'title_tk',
        'thumbnail',
        'album',
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

    public static function uploadImageMultipl(Request $request, $image = null): ?Stringable
    {
        if ($request->hasFile('album')) {
            if ($image) {
                Storage::delete($image);
            }
            foreach ($request->file('album') as $image) {
                $path = "images/album/" . date('Y-m-d');
                $name = $image->store($path);
                $fileNames[] = $name;
            }
            return Str::of(json_encode($fileNames))->replace(['\\', '[', '"', ']'], '');
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
        return asset("uploads/{$this->thumbnail}");
    }

    public function getAlbum()
    {
        return asset("uploads/{$this->album}");
    }
}
