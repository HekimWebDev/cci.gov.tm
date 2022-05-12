<?php

namespace App\Imports;

use App\Models\Brands;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BrandsImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {
            if (!isset($row[0])){
                continue;
            }

            /*Brands::create([
                'title' => $row[1],
                'article' => $row[2],
            ]);*/


            $brand = Brands::find($row[0]);

            $brand->title_tk = $row[1];
            $brand->article_tk = $row[2];

            $brand->save();
        }

    }
}
