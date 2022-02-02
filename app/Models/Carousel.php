<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class Post
 * @package App\Models
 * @mixin Builder;
 */
class Carousel extends Model
{
    use HasFactory, Translatable;
    
    protected $fillable = [
        'thumbnail',
        'thumbnail_en',
        'thumbnail_tk',
    ];

    public static function uploadImageRu(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store("images/{$folder}/carousel_ru");
        }
        return null;
    }

    public static function uploadImageEn(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail_en')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail_en')->store("images/{$folder}/carousel_en");
        }
        return null;
    }

    public static function uploadImageTk(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail_tk')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('thumbnail_tk')->store("images/{$folder}/carousel_tk");
        }
        return null;
    }

    public function getImage_ru()
    {
        return asset("uploads/{$this->thumbnail}");
    }
}
