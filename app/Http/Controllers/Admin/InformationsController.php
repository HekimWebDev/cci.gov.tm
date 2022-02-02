<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Informations::all();
        return view('admin.info.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.info.create');
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
            'phone' => 'required|string|min:8|max:255',
            'email' => 'email|required|max:255',
            'adress' => 'required|string|min:5|max:255',
            'adress_en' => 'required|string|min:5|max:255',
            'adress_tk' => 'required|string|min:5|max:255',
            'web' => 'required|string|min:5|max:100',
        ]);
        Informations::create($request->all());
        return redirect()->route('informations.index')->with('success', 'Новая информация успешна сохранилась');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Informations::find($id);
        return view('admin.info.edit', compact('information'));
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
            'phone' => 'required|string|min:8|max:255',
            'email' => 'email|required|max:255',
            'adress' => 'required|string|min:5|max:255',
            'adress_en' => 'required|string|min:5|max:255',
            'adress_tk' => 'required|string|min:5|max:255',
            'web' => 'required|string|min:5|max:100',
        ]);
        $information = Informations::find($id);
        $information->update($request->all());
        return redirect()->route('informations.index')->with('success', 'Ваше сообщение успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Informations::find($id);
        $info->delete($id);
        return redirect()->route('informations.index')->with('success', 'Информация удалена');
    }
}
