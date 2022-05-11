<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tmoffer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TmOffersController extends Controller
{

    public function index()
    {
        $tm_offers = Tmoffer::orderBy('number', 'desc')->paginate(10);

        return view('admin.biz_info.tm_offers.index', compact('tm_offers'));
    }


    public function create()
    {
        return view('admin.biz_info.tm_offers.create');
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
            'faks' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|min:3|max:255',
            'web' => 'nullable|string|min:3|max:255',
            'adress' => 'nullable|string|min:3|max:255',
            'adress_en' => 'nullable|string|min:3|max:255',
            'adress_tk' => 'nullable|string|min:3|max:255',
            'thumbnail' => 'nullable|image',
            'datesingle' => 'nullable|max:50',
        ]);

        $data = $request->all();

        $data['thumbnail'] = Tmoffer::uploadImage($request);

        Tmoffer::create($data);

        return redirect()->route('tm_offers.index')->with('success', 'Новое предложение успешно сохранилось');
    }


    public function edit(Tmoffer $tm_offer)
    {
        return view('admin.biz_info.tm_offers.edit', compact('tm_offer'));
    }


    public function update(Request $request, Tmoffer $tm_offer): RedirectResponse
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
            'faks' => 'nullable|string|min:3|max:255',
            'email' => 'nullable|string|min:3|max:255',
            'web' => 'nullable|string|min:3|max:255',
            'adress' => 'nullable|string|min:3|max:255',
            'adress_en' => 'nullable|string|min:3|max:255',
            'adress_tk' => 'nullable|string|min:3|max:255',
            'thumbnail' => 'nullable|image',
            'datesingle' => 'nullable|max:50',
        ]);

        $data = $request->all();

        if ($file = Tmoffer::uploadImage($request, $tm_offer->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $tm_offer->update($data);

        return redirect()->route('tm_offers.index')->with('success', 'Предложение успещно изменено');
    }


    public function destroy(Tmoffer $tm_offer)
    {
        Storage::delete($tm_offer->thumbnail);

        $tm_offer->delete();

        return redirect()->route('tm_offers.index')->with('success', 'Предложение успещно удалено');
    }
}
