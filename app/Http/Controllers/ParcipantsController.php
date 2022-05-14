<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Parcipants;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParcipantsController extends Controller
{
    public function index()
    {
        $parcipants = Parcipants::get();
        return view('admin.parcipants.index', compact('parcipants'));
    }

    public function single()
    {
        $parcipants = Parcipants::get();
        $title = 'parcipants-events';
        return view('org.parcipants-events', compact('parcipants', 'title'));
    }


    public function create()
    {
        return view('admin.parcipants.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'desc' => 'required|min:5',
            'desc_en' => 'nullable',
            'desc_tk' => 'nullable',
        ]);

        $data = $request->all();

        Parcipants::create($data);

        return redirect()->route('exhibition.parcipants_events.index')->with('success', 'Успешно сохранился');
    }


    public function edit(Parcipants $parcipants)
    {
        return view('admin.parcipants.edit', compact('parcipants'));
    }


    public function update(Request $request, Parcipants $parcipants): RedirectResponse
    {
        $request->validate([
            'desc' => 'required|min:5',
            'desc_en' => 'nullable',
            'desc_tk' => 'nullable',
        ]);

        $data = $request->all();

        $parcipants->update($data);

        return redirect()->route('exhibition.parcipants_events.index')->with('success', 'Текст успещно изменен');
    }


    public function destroy(Parcipants $parcipants): RedirectResponse
    {
        $parcipants->delete();

        return redirect()->route('exhibition.parcipants_events.index')->with('success', 'Текст успещно удален');
    }
}
