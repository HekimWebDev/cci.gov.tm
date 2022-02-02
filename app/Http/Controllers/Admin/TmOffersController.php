<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tmoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TmOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tm_offers = Tmoffer::query()->orderBy('number', 'desc')->paginate(10);
        return view('admin.tm_offers.index', compact('tm_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tm_offers.create');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tm_offer = Tmoffer::find($id);
        return view('admin.tm_offers.edit', compact('tm_offer'));
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
        $tm_offer = Tmoffer::find($id);

        $data = $request->all();

        if ($file = Tmoffer::uploadImage($request, $tm_offer->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $tm_offer->update($data);
        return redirect()->route('tm_offers.index')->with('success', 'Предложение успещно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tm_offer = Tmoffer::find($id);
        Storage::delete($tm_offer->thumbnail);
        $tm_offer->delete($id);
        return redirect()->route('tm_offers.index')->with('success', 'Предложение успещно удалено');
    }
}
