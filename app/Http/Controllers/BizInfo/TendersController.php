<?php

namespace App\Http\Controllers\BizInfo;

use App\Http\Controllers\Controller;
use App\Models\Tender;

class TendersController extends Controller
{
    public function __invoke()
    {
        $title = __('main.controllers.tenders');
        $tenders = Tender::paginate(5);
        return view('org.biz_info.tenders', compact('tenders', 'title'));
    }
}
