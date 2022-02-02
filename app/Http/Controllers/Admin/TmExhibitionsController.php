<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tmexhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TmExhibitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tm_exhibitions = Tmexhibition::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.tm_exhibitions.index', compact('tm_exhibitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tm_exhibitions.create');
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
            'datesingle' => 'required|min:5|max:200',
            'datesingle2' => 'nullable|min:5|max:200',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Tmexhibition::uploadImage($request);
        if ($request->datesingle2) {
            $data['datesingle'] = $request->datesingle .' - '. $request->datesingle2;
        }
        Tmexhibition::create($data);
        return redirect()->route('tm_exhibitions.index')->with('success', 'Новая выставка успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tm_exhibition = Tmexhibition::find($id);
        return view('admin.tm_exhibitions.edit', compact('tm_exhibition'));
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
            'datesingle' => 'required|nullable',
            'thumbnail' => 'nullable|image',
        ]);
        $tm_exhibition = Tmexhibition::find($id);

        $data = $request->all();
        if ($file = Tmexhibition::uploadImage($request, $tm_exhibition->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $tm_exhibition->update($data);
        return redirect()->route('tm_exhibitions.index')->with('success', 'Выставка успешна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tm_exhibition = Tmexhibition::find($id);
        Storage::delete($tm_exhibition->thumbnail);
        $tm_exhibition->delete($id);
        return redirect()->route('tm_exhibitions.index')->with('success', 'Выставка успешна удалена');
    }
}
