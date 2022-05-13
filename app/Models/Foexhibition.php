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
class Foexhibition extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'title',
        'title_en',
        'title_tk',
        'thumbnail',
        'date',
        'file',
        'file_tk',
        'file_en',
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

    public static function uploadFiles(Request $request, $file = null)
    {
        if ($request->hasFile('file')) {
            if ($file) {
                Storage::delete($file);
            }
            $folder = date('Y-m-d');
            return $request->file('file')->store("file/{$folder}");
        }
        return null;
    }
    public static function uploadFilesTk(Request $request, $file = null)
    {
        if ($request->hasFile('file_tk')) {
            if ($file) {
                Storage::delete($file);
            }
            $folder = date('Y-m-d');
            return $request->file('file_tk')->store("file/{$folder}");
        }
        return null;
    }
    public static function uploadFilesEn(Request $request, $file = null)
    {
        if ($request->hasFile('file_en')) {
            if ($file) {
                Storage::delete($file);
            }
            $folder = date('Y-m-d');
            return $request->file('file_en')->store("file/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->thumbnail) {
             return asset('no-image.jpg');
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function getFile(): string
    {
        return asset("uploads/{$this->file}");
    }
}
