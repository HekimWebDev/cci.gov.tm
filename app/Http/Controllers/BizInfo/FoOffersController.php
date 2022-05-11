<?php

namespace App\Http\Controllers\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Fooffer;

class FoOffersController extends Controller
{
    public function __invoke()
    {
        $title = __('main.controllers.fo_offers');
        $fo_offers = Fooffer::query()->orderBy('number')->paginate(10);
        return view('org.biz_info.fo-offers', compact('fo_offers', 'title'));
    }
}
