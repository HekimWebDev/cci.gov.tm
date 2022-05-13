<?php
namespace App\Http\Controllers\Admin\Exhibition;

use App\Http\Controllers\Controller;
use App\Models\Tmexhibition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TmExhibitionsController extends Controller
{
    public function index()
    {
        $tm_exhibitions = Tmexhibition::orderByDesc('id')->paginate(10);
        return view('admin.tm_exhibitions.index', compact('tm_exhibitions'));
    }


    public function create()
    {
        return view('admin.tm_exhibitions.create');
    }


    public function store(Request $request): RedirectResponse
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

        return redirect()->route('exhibition.tm_exhibitions.index')->with('success', 'Новая выставка успешна сохранилась');
    }


    public function edit(Tmexhibition $tm_exhibition)
    {
        return view('admin.tm_exhibitions.edit', compact('tm_exhibition'));
    }


    public function update(Request $request, Tmexhibition $tm_exhibition): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'datesingle' => 'required|nullable',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($file = Tmexhibition::uploadImage($request, $tm_exhibition->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $tm_exhibition->update($data);

        return redirect()->route('exhibition.tm_exhibitions.index')->with('success', 'Выставка успешна изменена');
    }


    public function destroy(Tmexhibition $tm_exhibition): RedirectResponse
    {
        Storage::delete($tm_exhibition->thumbnail);

        $tm_exhibition->delete();

        return redirect()->route('exhibition.tm_exhibitions.index')->with('success', 'Выставка успешна удалена');
    }
}
