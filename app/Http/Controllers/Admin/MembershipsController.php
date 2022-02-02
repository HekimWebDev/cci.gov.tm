<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;


class MembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.memberships.index', compact('memberships'));
    }

    // public function single($id){
    //     $membership = Membership::find($id);
    //     return view('admin.memberships.single', compact('membership'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.memberships.create');
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
            'title_en' => 'required|string|min:3|max:255',
            'title_tk' => 'required|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
        ]);
        Membership::create($request->all());
        return redirect()->route('memberships.index')->with('success', 'Новая страница создана успешна');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::find($id);
        return view('admin.memberships.edit', compact('membership'));
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
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'required|string|min:3|max:255',
            'title_tk' => 'required|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
        ]);
        $memberships = Membership::find($id);
        $memberships->update($request->all());
        return redirect()->route('memberships.index')->with('success', 'Страница успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memberships = Membership::find($id);
        $memberships->delete($id);
        return redirect()->route('memberships.index')->with('success', 'Страница успешно удалено');
    }
}
