<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;


class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenders = Tender::paginate(10);
        return view('admin.tenders.index', compact('tenders'));
    }

    public function single($id){
        $tender = Tender::find($id);
        return view('admin.tenders.single', compact('tender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tenders.create');
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
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:5|',
            'desc_en' => 'nullable|string|min:5|',
            'desc_tk' => 'nullable|string|min:5|',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'email' => 'nullable|string|email|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'organizer' => 'nullable|string|min:5|max:255',
            'organizer_en' => 'nullable|string|min:5|max:255',
            'organizer_tk' => 'nullable|string|min:5|max:255',
            'datesingle' => 'nullable|date',
        ]);
        Tender::create($request->all());
        return redirect()->route('tenders.index')->with('success', 'Новый тендер успешно сохранился');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tender = Tender::find($id);
        return view('admin.tenders.edit', compact('tender'));
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
            'title' => 'required|min:3|max:255|string',
            'title_en' => 'nullable|min:3|max:255|string',
            'title_tk' => 'nullable|min:3|max:255|string',
            'desc' => 'required|min:5|string',
            'desc_en' => 'nullable|min:5|string',
            'desc_tk' => 'nullable|min:5|string',
            'phone' => 'nullable|min:7|max:255|string',
            'faks' => 'nullable|min:7|max:255|string',
            'adress' => 'nullable|min:5|max:255|string',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
            'email' => 'nullable|email|string|max:255',
            'web' => 'nullable|string|min:5|max:255',
            'organizer' => 'nullable|string|min:5|max:255',
            'organizer_en' => 'nullable|string|min:5|max:255',
            'organizer_tk' => 'nullable|string|min:5|max:255',
            'datesingle' => 'nullable|date',
        ]);
        $Tender = Tender::find($id);
        $Tender->update($request->all());
        return redirect()->route('tenders.index')->with('success', 'Тендер успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tender = Tender::find($id);
        $tender->delete($id);
        return redirect()->route('tenders.index')->with('success', 'Тендер успешно удалён');
    }
}
