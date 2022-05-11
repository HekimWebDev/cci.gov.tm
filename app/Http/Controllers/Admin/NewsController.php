<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::query()->orderBy('updated_at', 'desc')->paginate(16);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'updated_at' => 'required|string|min:9|max:10',
            'thumbnail' => 'required|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = News::uploadImage($request);
        $data['date'] = $data['updated_at'];
        News::create($data);
        return redirect()->route('news.index')->with('success', 'Новость успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'updated_at' => 'required|string|min:9|max:10',
            'thumbnail' => 'nullable|image',
        ]);
        $news = News::find($id);

        $data = $request->all();

        if ($file = News::uploadImage($request, $news->thumbnail)) {
            $data['thumbnail'] = $file;
        }

//        $date = date_create($data['updated_at']);
//        $data['updated_at'] = date_format($date['date'], "Y.m.d");
        $data['date'] = $data['updated_at'];
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'Новость успещна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        Storage::delete($news->thumbnail);
        $news->delete($id);
        return redirect()->route('news.index')->with('success', 'Новость успешна удалена');
    }
}
