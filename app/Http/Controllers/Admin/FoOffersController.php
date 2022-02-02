<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Fooffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fo_offers = Fooffer::query()->orderBy('number', 'desc')->paginate(10);
        return view('admin.fo_offers.index', compact('fo_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.fo_offers.create');
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
        return redirect()->route('fo_offers.index')->with('success', 'Новое предложение успешно сохранилось');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fo_offer = Fooffer::find($id);
        return view('admin.fo_offers.edit', compact('fo_offer'));
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
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'thumbnail' => 'nullable|image',
            'datesingle' => 'nullable|min:4|max:50',
        ]);
        $fo_offer = Fooffer::find($id);

        $data = $request->all();

        if ($file = Fooffer::uploadImage($request, $fo_offer->thumbnail)) {
            $data['thumbnail'] = $file;
        }
        $fo_offer->update($data);
        return redirect()->route('fo_offers.index')->with('success', 'Предложение успещно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fo_offer = Fooffer::find($id);
        Storage::delete($fo_offer->thumbnail);
        $fo_offer->delete($id);
        return redirect()->route('fo_offers.index')->with('success', 'Предложение успещно удалено');
    }
}
