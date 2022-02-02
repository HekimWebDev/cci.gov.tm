<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::paginate(15);
        return view('admin.form.index', compact('forms'));
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
            'email' => 'required|string|email|max:255',
            'theme' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:3',
        ]);
        Form::create($request->all());
        return redirect()->back()->with('success', __('main.controllers.inv_success'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = Form::find($id);
        $app->delete($id);
        return back()->with('success', 'Удален');
    }
}
