<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contacts.create');
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
            'phone' => 'required|string|min:7|max:255',
            'faks' => 'required|string|min:7|max:255',
            'email' => 'required|string|max:255',
        ]);
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Новые контакты успешно сохранились');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contacts.edit', compact('contact'));
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
            'phone' => 'nullable|string|min:7|max:255',
            'faks' => 'nullable|string|min:7|max:255',
            'email' => 'nullable|string|max:255',
        ]);
        $contacts = Contact::find($id);
        $contacts->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Контакты успещно изменены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete($id);
        return redirect()->route('contacts.index')->with('success', 'Контакты успещно удалены');
    }
}
