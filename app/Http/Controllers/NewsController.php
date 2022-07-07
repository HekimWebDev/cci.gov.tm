<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $title = __('main.controllers.news');

        $news = News::orderByDesc('publish_at')->paginate('9');

        return view('org.news.news', compact('news', 'title'));
    }

    public function single($slug){
        $title = __('main.controllers.news');
        $news = News::where('slug', $slug)->firstOrFail();
        return view('org.news.single', compact('news', 'title'));
    }
}
