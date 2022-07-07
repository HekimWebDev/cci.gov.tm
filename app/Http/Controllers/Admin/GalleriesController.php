<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleriesController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderByDesc('id')->paginate(15);

        return view('admin.galleries.index', compact('galleries'));
    }



    public function single($id){
        $gallery = Gallery::find($id);

        $album = Str::of($gallery->album)->explode(',');

        return view('admin.galleries.single', compact('gallery', 'album'));
    }



    public function create()
    {
        return view('admin.galleries.create');
    }



    public function store(Request $request)
    {
//        dd($request->all());
        $data = $request->validate([
            'title' => 'required|min:3|max:255|string',
            'title_en' => 'required|min:3|max:255|string',
            'title_tk' => 'required|min:3|max:255|string',
            'thumbnail' => 'required|image',
            'album[]' => 'nullable|image',
        ]);

        $data['thumbnail'] = Gallery::uploadImage($request);

        $data['album'] = Gallery::uploadImageMultipl($request);

        Gallery::create($data);

        return redirect()->route('galleries.index')->with('success', 'Изображение добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $album = Str::of($gallery->album)->explode(',');
        return view('admin.galleries.edit', compact('gallery', 'album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255|string',
            'title_en' => 'required|min:3|max:255|string',
            'title_tk' => 'required|min:3|max:255|string',
            'thumbnail' => 'nullable|image',
            'album[]' => 'nullable|image',
        ]);
        $gallery = Gallery::find($id);

        $data = $request->all();
        if ($file = Gallery::uploadImage($request, $gallery->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        if ($file = Gallery::uploadImageMultipl($request, $gallery->album)) {
            $data['album'] = $file;
        }
        $gallery->update($data);
        return redirect()->route('galleries.index')->with('success', 'Альбом успещно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $album = Str::of($gallery->album)->explode(',');
        foreach($album as $a){
            Storage::delete($gallery->thumbnail, $a);
        }
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Изображение удалено');
    }
}
