<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'is_show',
        'name',
        'name_en',
        'name_tk',
        'title',
        'title_en',
        'title_tk',
        'phone',
        'faks',
        'email',
        'web',
        'adress',
        'adress_en',
        'adress_tk',
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

    public function getImage()
    {
        if (!$this->thumbnail) {
            return asset('no-image.jpg');
        }else{
            return asset("uploads/{$this->thumbnail}");
        }
    }
}
