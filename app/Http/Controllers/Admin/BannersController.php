<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(15);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'thumbnail' => 'required|image',
           'thumbnail_en' => 'required|image',
           'thumbnail_tk' => 'required|image',
        ]);
        $data = [];
        $data['thumbnail'] = Banner::uploadImageRu($request);
        $data['thumbnail_en'] = Banner::uploadImageEn($request);
        $data['thumbnail_tk'] = Banner::uploadImageTk($request);

        Banner::create($data);
        return redirect()->route('banners.index')->with('success', 'Изображение добавлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::delete([$banner->thumbnail, $banner->thumbnail_en, $banner->thumbnail_tk]);
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Изображение удалено');
    }
}
