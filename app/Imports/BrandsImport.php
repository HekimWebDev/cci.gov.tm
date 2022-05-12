<?php

namespace App\Imports;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Brands([
            'title_tk'     => $row[1],
            'article_tk'    => $row[2],
        ]);
    }
}
