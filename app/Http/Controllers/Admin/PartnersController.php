<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::query()->orderBy('id', 'desc')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    public function single($id){
        $partner = partner::find($id);
        return view('admin.partners.single', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
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
        return redirect()->route('partners.index')->with('success', 'Новый партнер успешно сохранился');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = partner::find($id);
        return view('admin.partners.edit', compact('partner'));
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
        return redirect()->route('partners.index')->with('success', 'Партнёр успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        Storage::delete($partner->thumbnail);
        $partner->delete($id);
        return redirect()->route('partners.index')->with('success', 'Партнёр успешно удалён');
    }
}
