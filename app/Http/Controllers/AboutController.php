<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about($slug){
        $about = About::query()->where('slug', $slug)->firstOrFail();
        $title = __('main.controllers.about');
        return view('org.about.about', compact('about', 'title'));
    }
}
