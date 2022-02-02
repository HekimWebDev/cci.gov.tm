<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Parcipants;
use Illuminate\Http\Request;


class ParcipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcipants = Parcipants::all();
        return view('admin.parcipants.index', compact('parcipants'));
    }

    public function single()
    {
        $title = __('main.controllers.parcipants');
        $parcipants = Parcipants::all();
        return view('org.parcipants-events', compact('parcipants', 'title'));
    }

    public function create()
    {
        return view('admin.parcipants.create');
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
            'desc' => 'required|min:5',
            'desc_en' => 'nullable',
            'desc_tk' => 'nullable',
        ]);

        $data = $request->all();
        Parcipants::create($data);
        return redirect()->route('parcipants_events.index')->with('success', 'Успешно сохранился');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parcipants = Parcipants::find($id);
        return view('admin.parcipants.edit', compact('parcipants'));
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
            'desc' => 'required|min:5',
            'desc_en' => 'nullable',
            'desc_tk' => 'nullable',
        ]);
        $parcipants = Parcipants::find($id);

        $data = $request->all();
        $parcipants->update($data);
        return redirect()->route('parcipants_events.index')->with('success', 'Текст успещно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parcipants = Parcipants::find($id);
        $parcipants->delete($id);
        return redirect()->route('parcipants_events.index')->with('success', 'Текст успещно удален');
    }
}
