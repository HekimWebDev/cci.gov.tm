<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentsController extends Controller
{

    public function single($slug){
        $investment = Investment::query()->where('slug', $slug)->firstOrFail();
        $title = $investment->__('name').' | '.__('main.cci');
        return view('org.investments', compact('investment', 'title'));
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
        return redirect()->back()->with('success', 'Ваша собшение успешно сохранился');
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
        return redirect()->route('app.index')->with('success', 'Удален');
    }
}
