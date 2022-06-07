<?php

namespace App\Http\Controllers\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnersController extends Controller
{
    public function __invoke()
    {
        $title = __('main.controllers.partners');
        $partners = Partner::orderByDesc('id')->paginate(10);
        return view('org.biz_info.partners', compact('partners', 'title'));
    }
}
