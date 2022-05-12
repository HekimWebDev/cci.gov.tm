<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foexhibition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoExhibitionsController extends Controller
{
    public function index()
    {
        $fo_exhibitions = Foexhibition::orderBy('id', 'desc')->paginate(10);

        return view('admin.fo_exhibitions.index', compact('fo_exhibitions'));
    }


    public function create()
    {
        return view('admin.fo_exhibitions.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'date' => 'required|string',
            'thumbnail' => 'nullable|image',
            'file' => 'nullable|file|mimes:doc,pdf,docx',
            'file_tk' => 'nullable|file|mimes:doc,pdf,docx',
            'file_en' => 'nullable|file|mimes:doc,pdf,docx',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Foexhibition::uploadImage($request);
        $data['file'] = Foexhibition::uploadFiles($request);
        $data['file_tk'] = Foexhibition::uploadFilesTk($request);
        $data['file_en'] = Foexhibition::uploadFilesEn($request);

        Foexhibition::create($data);

        return redirect()->route('fo_exhibitions.index')->with('success', 'Новая выставка успешна сохранилась');
    }


    public function edit(int $id)
    {
        $fo_exhibition = Foexhibition::find($id);

        return view('admin.fo_exhibitions.edit', compact('fo_exhibition'));
    }


    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'title_en' => 'nullable|min:3|max:255',
            'title_tk' => 'nullable|min:3|max:255',
            'date' => 'nullable',
            'thumbnail' => 'nullable|image',
            'file' => 'nullable|file|mimes:doc,pdf,docx',
            'file_tk' => 'nullable|file|mimes:doc,pdf,docx',
            'file_en' => 'nullable|file|mimes:doc,pdf,docx',
        ]);

        $fo_exhibition = Foexhibition::find($id);
        $data = $request->all();

        if ($file = Foexhibition::uploadImage($request, $fo_exhibition->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        if ($file = Foexhibition::uploadFiles($request, $fo_exhibition->file)) {
            $data['file'] = $file;
        }
        if ($file = Foexhibition::uploadFilesTk($request, $fo_exhibition->file_tk)) {
            $data['file_tk'] = $file;
        }
        if ($file = Foexhibition::uploadFilesEn($request, $fo_exhibition->file_en)) {
            $data['file_en'] = $file;
        }

        $fo_exhibition->update($data);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна изменена');
    }


    public function destroy($id): RedirectResponse
    {
        $fo_exhibition = Foexhibition::find($id);

        Storage::delete($fo_exhibition->thumbnail);
        Storage::delete($fo_exhibition->file);
        Storage::delete($fo_exhibition->file_tk);
        Storage::delete($fo_exhibition->file_en);

        $fo_exhibition->delete($id);

        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна удалена');
    }
}
