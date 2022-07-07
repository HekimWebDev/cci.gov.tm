<?php

namespace App\Http\Controllers;

use App\Models\NewsCci;

class NewsCciController extends Controller
{
    public function index(){
        $title = __('main.controllers.news');
        $news = NewsCci::orderByDesc('publish_at')->paginate('9');
        return view('org.news_cci.news', compact('news', 'title'));
    }

    public function single($slug){
        $title = __('main.controllers.news');
        $news = NewsCci::where('slug', $slug)->firstOrFail();
        return view('org.news_cci.single', compact('news', 'title'));
    }
}
