<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::paginate(15);
        return view('admin.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.carousels.create');
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
        $data['thumbnail'] = Carousel::uploadImageRu($request);
        $data['thumbnail_en'] = Carousel::uploadImageEn($request);
        $data['thumbnail_tk'] = Carousel::uploadImageTk($request);

        Carousel::create($data);
        return redirect()->route('carousels.index')->with('success', 'Изображение добавлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carouser = Carousel::find($id);
        Storage::delete([$carouser->thumbnail, $carouser->thumbnail_en, $carouser->thumbnail_tk]);
        $carouser->delete();
        return redirect()->route('carousels.index')->with('success', 'Изображение добавлено');
    }
}
