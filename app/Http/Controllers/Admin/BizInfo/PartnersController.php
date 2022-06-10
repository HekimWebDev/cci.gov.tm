<?php

namespace App\Http\Controllers\Admin\BizInfo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partners\PartnersStoreRequest;
use App\Http\Requests\Partners\PartnersUpdateRequest;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::orderByDesc('id')->paginate(10);

        return view('admin.biz_info.partners.index', compact('partners'));
    }


    public function show(Partner $partner){
        return view('admin.biz_info.partners.single', compact('partner'));
    }


    public function create()
    {
        return view('admin.biz_info.partners.create');
    }


    public function store(PartnersStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_show'] = $request->boolean('is_show');

        $data['thumbnail'] = Partner::uploadImage($request);

        Partner::create($data);

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Новый партнер успешно сохранился');
    }


    public function edit(Partner $partner)
    {
        return view('admin.biz_info.partners.edit', compact('partner'));
    }


    public function update(PartnersUpdateRequest $request, Partner $partner): RedirectResponse
    {
        $data = $request->validated();

        $data['is_show'] = $request->boolean('is_show');

        if ($file = Partner::uploadImage($request, $partner->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $partner->update($data);

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Партнёр успешно изменён');
    }


    public function destroy(Partner $partner): RedirectResponse
    {
        Storage::delete($partner->thumbnail);

        $partner->delete();

        return redirect()->route('admin.biz-info.partners.index')->with('success', 'Партнёр успешно удалён');
    }
}
