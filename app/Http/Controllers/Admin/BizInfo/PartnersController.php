<?php

namespace App\Http\Controllers\Admin\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::orderByDesc('id')->paginate(10);

        return view('admin.partners.index', compact('partners'));
    }


    public function show($id){
        $partner = partner::find($id);

        return view('admin.partners.single', compact('partner'));
    }


    public function create()
    {
        return view('admin.partners.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'nullable|string|min:3|max:255',
            'name_tk' => 'nullable|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'adress' => 'nullable|string|min:4|max:255',
            'adress_en' => 'nullable|string|min:4|max:255',
            'adress_tk' => 'nullable|string|min:4|max:255',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Partner::uploadImage($request);

        Partner::create($data);

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Новый партнер успешно сохранился');
    }


    public function edit($id)
    {
        $partner = partner::find($id);

        return view('admin.partners.edit', compact('partner'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'nullable|string|min:3|max:255',
            'name_tk' => 'nullable|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'thumbnail' => 'nullable|image',
        ]);

        $partner = Partner::find($id);

        $data = $request->all();

        if ($file = Partner::uploadImage($request, $partner->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $partner->update($data);

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Партнёр успешно изменён');
    }


    public function destroy($id): RedirectResponse
    {
        $partner = Partner::find($id);

        Storage::delete($partner->thumbnail);

        $partner->delete($id);

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Партнёр успешно удалён');
    }
}
