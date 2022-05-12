<?php

namespace App\Http\Controllers\BizInfo;


use App\Http\Controllers\Controller;
use App\Imports\BrandsImport;
use App\Models\Brands;
use Maatwebsite\Excel\Facades\Excel;

class LocalBrandsController extends Controller
{
    public function __invoke()
    {
        $brands = Brands::orderByDesc('id')->paginate(12);

        $title = 'Local brands';

        return view('org.biz_info.local_brands', compact('title', 'brands'));
    }
}
