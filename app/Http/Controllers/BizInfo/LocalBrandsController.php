<?php

namespace App\Http\Controllers\BizInfo;


use App\Http\Controllers\Controller;
use App\Models\Brands;

class LocalBrandsController extends Controller
{
    public function __invoke()
    {
        $brands = Brands::orderByDesc('id')->paginate(12);
        $title = 'Local brands';
        return view('org.biz_info.local_brands', compact('title', 'brands'));
    }
}
