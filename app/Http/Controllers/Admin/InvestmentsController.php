<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;


class InvestmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments = Investment::all();
        return view('admin.investments.index', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.investments.create');
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
            'name' => 'required|string|min:5|max:255',
            'name_en' => 'required|string|min:5|max:255',
            'name_tk' => 'required|string|min:5|max:255',
            'desc' => 'required|min:10',
            'desc_en' => 'nullable|min:10',
            'desc_tk' => 'nullable|min:10',
            'is_file' => 'nullable',
        ]);
        Investment::create($request->all());
        return redirect()->route('investments.index')->with('success', 'Новая страница создана успешна');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investment = Investment::find($id);
        return view('admin.investments.edit', compact('investment'));
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
            'name' => 'required|string|min:5|max:255',
            'name_en' => 'required|string|min:5|max:255',
            'name_tk' => 'required|string|min:5|max:255',
            'desc' => 'required|min:10',
            'desc_en' => 'nullable|min:10',
            'desc_tk' => 'nullable|min:10',
            'is_form' => 'nullable',
        ]);
        $data = $request->all();
        if ($request->input('is_form') != 1) {
            $data['is_form'] = 0;
        }
        $investments = Investment::find($id);
        $investments->update($data);
        return redirect()->route('investments.index')->with('success', 'Страница успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investments = Investment::find($id);
        $investments->delete($id);
        return redirect()->route('investments.index')->with('success', 'Страница успешно удалено');
    }
}
