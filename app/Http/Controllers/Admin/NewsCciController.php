<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCci;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class NewsCciController extends Controller
{
    public function index()
    {
        $news = NewsCci::query()->orderBy('publish_at')->paginate(16);

        return view('admin.news_cci.index', compact('news'));
    }



    public function create()
    {
        return view('admin.news_cci.create');
    }



    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'publish_at' => 'required|date',
            'thumbnail' => 'required|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = NewsCci::uploadImage($request);
        NewsCci::create($data);
        return redirect()->route('news_cci.index')->with('success', 'Новость успешна сохранилась');
    }



    public function edit(NewsCci $newsCci)
    {
        return view('admin.news_cci.edit', compact('newsCci'));
    }



    public function update(Request $request, NewsCci $newsCci): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5',
            'desc_en' => 'nullable|string|min:5',
            'desc_tk' => 'nullable|string|min:5',
            'publish_at' => 'required|date',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($file = NewsCci::uploadImage($request, $newsCci->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $newsCci->update($data);
        return redirect()->route('news_cci.index')->with('success', 'Новость успещна изменена');
    }



    public function destroy(NewsCci $newsCci): RedirectResponse
    {
        Storage::delete($newsCci->thumbnail);
        $newsCci->delete();
        return redirect()->route('news_cci.index')->with('success', 'Новость успешна удалена');
    }
}
