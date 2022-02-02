<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Foexhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoExhibitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fo_exhibitions = Foexhibition::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.fo_exhibitions.index', compact('fo_exhibitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.fo_exhibitions.create');
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
            'date' => 'required|string',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Foexhibition::uploadImage($request);
        Foexhibition::create($data);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Новая выставка успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fo_exhibition = Foexhibition::find($id);
        return view('admin.fo_exhibitions.edit', compact('fo_exhibition'));
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
            'title' => 'required|min:3|max:255',
            'title_en' => 'nullable|min:3|max:255',
            'title_tk' => 'nullable|min:3|max:255',
            'date' => 'nullable',
            'thumbnail' => 'nullable|image',
        ]);
        $fo_exhibition = Foexhibition::find($id);

        $data = $request->all();
        if ($file = Foexhibition::uploadImage($request, $fo_exhibition->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $fo_exhibition->update($data);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fo_exhibition = Foexhibition::find($id);
        Storage::delete($fo_exhibition->thumbnail);
        $fo_exhibition->delete($id);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна удалена');
    }
}
