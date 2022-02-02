<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;


class ConferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::paginate(10);
        return view('admin.conferences.index', compact('conferences'));
    }

    public function single($id){
        $conference = Conference::find($id);
        return view('admin.conferences.single', compact('conference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.conferences.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'name_en' => 'required|string|min:3|max:255',
            'name_tk' => 'required|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
            'content' => 'required|string|min:3',
            'content_en' => 'nullable|string|min:3',
            'content_tk' => 'nullable|string|min:3',
            'date' => 'required|string|min:5|max:255',
        ]);
        Conference::create($request->all());
        return redirect()->route('conferences.index')->with('success', 'Новая страница в "конференции" успешно создана');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conferences = Conference::find($id);
        return view('admin.conferences.edit', compact('conferences'));
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
            'name_en' => 'required|string|min:3|max:255',
            'name_tk' => 'required|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
            'content' => 'required|string|min:3',
            'content_en' => 'nullable|string|min:3',
            'content_tk' => 'nullable|string|min:3',
            'date' => 'required|string|min:5|max:255',
        ]);
        $conferences = Conference::find($id);
        $conferences->update($request->all());
        return redirect()->route('conferences.index')->with('success', 'Страница в "конференции" успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conferences = Conference::find($id);
        $conferences->delete($id);
        return redirect()->route('conferences.index')->with('success', 'Страница в "конференции" успещно удалена');
    }
}
