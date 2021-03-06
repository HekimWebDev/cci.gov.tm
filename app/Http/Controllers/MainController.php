<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Carousel;
use App\Models\Conference;
use App\Models\Gallery;
use App\Models\Membership;
use App\Models\News;
use App\Models\NewsCci;
use App\Models\Partner;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index(){
        $news = News::orderByDesc('publish_at')->get()->take('3');
        $newsCci = NewsCci::orderByDesc('publish_at')->get()->take('3');
        $galleries = Gallery::get();
        $partners = Partner::select(['thumbnail', 'is_show'])->get();
        $banner = Banner::get();
        $carousels = Carousel::get();
        $title = __('main.controllers.main');
        return view('org.home', compact('news', 'newsCci', 'galleries', 'partners', 'banner', 'carousels', 'title'));
    }

    public function branch($slug){
        $branch = Branch::where('slug', $slug)->firstOrFail();
        $title = $branch->__('name').' | '.__('main.cci');
        return view('org.branch_single', compact('branch', 'title'));
    }

    public function album($slug){
        $gallery = Gallery::query()->where('slug', $slug)->firstOrFail();
        $album = Str::of($gallery->album)->explode(',');
        $title = __('main.controllers.album');
        return view('org.album', compact('gallery', 'album', 'title'));
    }

    public function membership($slug){
        $membership = Membership::query()->where('slug', $slug)->firstOrFail();
        $title = __('main.controllers.membership');
        return view('org.membership', compact('membership', 'title'));
    }

    public function conferences($slug)
    {
        $conf = Conference::query()->where('slug', $slug)->firstOrFail();
        $title = __('main.controllers.conf');
        return view('org.conferences', compact('conf', 'title'));
    }

    public function changeLocale($locale){
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
