<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.abouts.create');
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
            'title_en' => 'required|string|min:3|max:255',
            'title_tk' => 'required|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = About::uploadImage($request);
        About::create($data);
        return redirect()->route('abouts.index')->with('success', 'Успешно сохранился');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.abouts.edit', compact('about'));
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
            'title_en' => 'required|string|min:3|max:255',
            'title_tk' => 'required|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'thumbnail' => 'nullable|image',
        ]);
        $about = About::find($id);

        $data = $request->all();
        if ($file = About::uploadImage($request, $about->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $about->update($data);
        return redirect()->route('abouts.index')->with('success', 'Текст успещно изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        Storage::delete($about->thumbnail);
        $about->delete($id);
        return redirect()->route('abouts.index')->with('success', 'Текст успещно удалён');
    }
}
