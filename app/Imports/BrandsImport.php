<?php

namespace App\Imports;

use App\Models\Brands;
use App\Models\Fooffer;
use App\Models\Tmoffer;
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

            $name = $row[1];
            $title = $row[7];
            $site = $row[9];
            $mail = $row[10];
            $address = $row[12];
            $contact = $row[13];

            Fooffer::create([
                'name' => $name,
                'desc' => $title,
                'web' => $site,
                'email' => $mail,
                'adress' => $address,
                'phone' => $contact,
                'datesingle' => 2022,
            ]);

        }

    }
}
