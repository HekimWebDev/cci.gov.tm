<?php

namespace App\Imports;

use App\Models\Brands;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BrandsImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        $i = 0;
        foreach ($rows as $row)
        {
            $i++;
            if ($i === 1){
                continue;
            }

            dd($row[12]);

            $name = $row[1];
            $title = $row[7];
            $site = $row[9];
            $mail = $row[10];
            $address = $row[12];

        }

    }
}
