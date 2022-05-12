<?php

namespace App\Http\Controllers\Admin\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocalBrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::orderByDesc('id')->paginate(20);
        return view('admin.biz_info.local_brands.list', compact('brands'));
    }


    public function create()
    {
        return view('admin.biz_info.local_brands.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'article' => 'nullable|string|min:5|max:255',
            'article_en' => 'nullable|string|min:5|max:255',
            'article_tk' => 'nullable|string|min:5|max:255',

            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Brands::uploadImage($request);
        Brands::create($data);
        return redirect()->route('local-brands.index')->with('success', 'Новый бранд успешно сохранился');
    }

    public function edit($id)
    {
        $brand = Brands::find($id);
        return view('admin.biz_info.local_brands.edit', compact('brand'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'article' => 'nullable|string|min:5|max:255',
            'article_en' => 'nullable|string|min:5|max:255',
            'article_tk' => 'nullable|string|min:5|max:255',

            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();
        $brand = Brands::find($id);

        if ($file = Brands::uploadImage($request, $brand->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $brand->update($data);

        return redirect()->back()->with('success', 'Бренд успешно изменён');
    }

    public function destroy($id): RedirectResponse
    {
        $brands = Brands::find($id);
        Storage::delete($brands->thumbnail);

        $brands->delete();

        return redirect()->back()->with('success', 'Бренд успешно удалён');
    }
}
