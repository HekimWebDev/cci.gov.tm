<?php

namespace App\Http\Controllers\Admin\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TenderController extends Controller
{

    public function index()
    {
        $tenders = Tender::orderByDesc('id')->paginate(10);

        return view('admin.biz_info.tenders.index', compact('tenders'));
    }


    public function show($id){
        $tender = Tender::find($id);

        return view('admin.biz_info.tenders.single', compact('tender'));
    }


    public function create()
    {
        return view('admin.biz_info.tenders.create');
    }


    public function store(Request $request): RedirectResponse
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

        return redirect()->route('admin.biz-info.tenders.index')->with('success', 'Новый тендер успешно сохранился');
    }


    public function edit($id)
    {
        $tender = Tender::find($id);

        return view('admin.biz_info.tenders.edit', compact('tender'));
    }


    public function update(Request $request, $id): RedirectResponse
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

        $tender = Tender::find($id);

        $tender->update($request->all());

        return redirect()->route('admin.biz-info.tenders.index')->with('success', 'Тендер успешно изменён');
    }


    public function destroy($id): RedirectResponse
    {
        $tender = Tender::find($id);

        $tender->delete($id);

        return redirect()->back()->with('success', 'Тендер успешно удалён');
    }
}
