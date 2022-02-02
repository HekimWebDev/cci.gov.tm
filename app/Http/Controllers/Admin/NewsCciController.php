<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsCciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsCci::query()->orderBy('id', 'desc')->paginate(16);
        return view('admin.news_cci.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news_cci.create');
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
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'date' => 'required|string|min:9|max:10',
            'thumbnail' => 'required|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = NewsCci::uploadImage($request);
        NewsCci::create($data);
        return redirect()->route('news_cci.index')->with('success', 'Новость успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsCci::find($id);
        return view('admin.news_cci.edit', compact('news'));
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
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'date' => 'required|string|min:9|max:10',
            'thumbnail' => 'nullable|image',
        ]);
        $news = NewsCci::find($id);

        $data = $request->all();

        if ($file = NewsCci::uploadImage($request, $news->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $news->update($data);
        return redirect()->route('news_cci.index')->with('success', 'Новость успещна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = NewsCci::find($id);
        Storage::delete($news->thumbnail);
        $news->delete($id);
        return redirect()->route('news_cci.index')->with('success', 'Новость успешна удалена');
    }
}
