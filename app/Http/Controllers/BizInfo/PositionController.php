<?php

namespace App\Http\Controllers\BizInfo;

use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function __invoke()
    {
        $title = 'Position';
        return view('org.biz_info.position', compact('title'));
    }
}
