<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Foexhibition;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FoExhibitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $fo_exhibitions = Foexhibition::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.fo_exhibitions.index', compact('fo_exhibitions'));
    }

    public function create()
    {
        return view('admin.fo_exhibitions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'date' => 'required|string',
            'thumbnail' => 'nullable|image',
            'files' => 'nullable|file|mimes:doc,pdf,docx',
            'files_tk' => 'nullable|file|mimes:doc,pdf,docx',
            'files_en' => 'nullable|file|mimes:doc,pdf,docx',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Foexhibition::uploadImage($request);
        $data['files'] = Foexhibition::uploadFiles($request);
        $data['files_tk'] = Foexhibition::uploadFilesTk($request);
        $data['files_en'] = Foexhibition::uploadFilesEn($request);
        Foexhibition::create($data);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Новая выставка успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $fo_exhibition = Foexhibition::find($id);
        return view('admin.fo_exhibitions.edit', compact('fo_exhibition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'title_en' => 'nullable|min:3|max:255',
            'title_tk' => 'nullable|min:3|max:255',
            'date' => 'nullable',
            'thumbnail' => 'nullable|image',
            'files' => 'nullable|file|mimes:doc,pdf,docx',
            'files_tk' => 'nullable|file|mimes:doc,pdf,docx',
            'files_en' => 'nullable|file|mimes:doc,pdf,docx',
        ]);

        $fo_exhibition = Foexhibition::find($id);
        $data = $request->all();

        if ($file = Foexhibition::uploadImage($request, $fo_exhibition->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        if ($file = Foexhibition::uploadFiles($request, $fo_exhibition->files)) {
            $data['files'] = $file;
        }
        if ($file = Foexhibition::uploadFilesTk($request, $fo_exhibition->files_tk)) {
            $data['files_tk'] = $file;
        }
        if ($file = Foexhibition::uploadFilesEn($request, $fo_exhibition->files_en)) {
            $data['files_en'] = $file;
        }

        $fo_exhibition->update($data);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $fo_exhibition = Foexhibition::find($id);
        Storage::delete($fo_exhibition->thumbnail);
        Storage::delete($fo_exhibition->files);
        Storage::delete($fo_exhibition->files_tk);
        Storage::delete($fo_exhibition->files_en);
        $fo_exhibition->delete($id);
        return redirect()->route('fo_exhibitions.index')->with('success', 'Выставка успешна удалена');
    }
}
