<?php

namespace App\Http\Controllers\Admin\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Fooffer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoOffersController extends Controller
{
    public function index()
    {
        $fo_offers = Fooffer::orderByDesc('id')->paginate(10);

        return view('admin.biz_info.fo_offers.index', compact('fo_offers'));
    }


    public function create()
    {
        return view('admin.biz_info.fo_offers.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'number' => 'nullable|numeric|max:100000000',
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'nullable|string|min:3|max:255',
            'name_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'thumbnail' => 'nullable|image',
            'datesingle' => 'nullable|min:4|max:50',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Fooffer::uploadImage($request);

        Fooffer::create($data);

        return redirect()->route('admin.biz-info.fo_offers.index')->with('success', 'Новое предложение успешно сохранилось');
    }


    public function edit(Fooffer $fo_offer)
    {
        return view('admin.biz_info.fo_offers.edit', compact('fo_offer'));
    }


    public function update(Request $request, Fooffer $fo_offer): RedirectResponse
    {
        $request->validate([
            'number' => 'nullable|numeric|max:100000000',
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'nullable|string|min:3|max:255',
            'name_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'thumbnail' => 'nullable|image',
            'datesingle' => 'nullable|min:4|max:50',
        ]);

        $data = $request->all();

        if ($file = Fooffer::uploadImage($request, $fo_offer->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $fo_offer->update($data);

        return redirect()->route('admin.biz-info.fo_offers.index')->with('success', 'Предложение успещно изменено');
    }


    public function destroy(Fooffer $fo_offer): RedirectResponse
    {
        Storage::delete($fo_offer->thumbnail);

        $fo_offer->delete();

        return redirect()->route('admin.biz-info.fo_offers.index')->with('success', 'Предложение успещно удалено');
    }
}
