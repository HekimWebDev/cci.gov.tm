<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;


class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(10);
        return view('admin.branches.index', compact('branches'));
    }

    public function single($id){
        $branch = Branch::find($id);
        return view('admin.branches.single', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.branches.create');
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
            'name_en' => 'required|string|min:3|max:255',
            'name_tk' => 'required|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'title_en' => 'nullable|string|min:3|max:255',
            'title_tk' => 'nullable|string|min:3|max:255',
            'desc' => 'required|string|min:3',
            'desc_en' => 'nullable|string|min:3',
            'desc_tk' => 'nullable|string|min:3',
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
        ]);
        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success', 'Новый предприятия успешна сохранился');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::find($id);
        return view('admin.branches.edit', compact('branches'));
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
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|max:255',
            'adress' => 'nullable|string|min:5|max:255',
            'adress_en' => 'nullable|string|min:5|max:255',
            'adress_tk' => 'nullable|string|min:5|max:255',
        ]);
        $branches = Branch::find($id);
        $branches->update($request->all());
        return redirect()->route('branches.index')->with('success', 'Предприятия успешно изменены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branches = Branch::find($id);
        $branches->delete($id);
        return redirect()->route('branches.index')->with('success', 'Предприятия успещно удалена');
    }
}
