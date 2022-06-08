<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsStoreRequest;
use App\Http\Requests\News\NewsUpdateRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('updated_at')->paginate(16);
        return view('admin.news.index', compact('news'));
    }



    public function create()
    {
        return view('admin.news.create');
    }



    public function store(NewsStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['thumbnail'] = News::uploadImage($request);

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Новость успешна сохранилась');
    }



    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }



    public function update(NewsUpdateRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();

        if ($file = News::uploadImage($request, $news->thumbnail)) {
            $data['thumbnail'] = $file;
        }

//        $date = date_create($data['updated_at']);
//        $data['updated_at'] = date_format($date['date'], "Y.m.d");
        $data['date'] = $data['updated_at'];
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'Новость успещна изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        Storage::delete($news->thumbnail);
        $news->delete($id);
        return redirect()->route('news.index')->with('success', 'Новость успешна удалена');
    }
}
