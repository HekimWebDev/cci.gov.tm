<?php

namespace App\Console\Commands;

use App\Imports\BrandsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    protected $signature = 'command:import';

    protected $description = 'Command description';

    public function handle()
    {
        Excel::import(new BrandsImport(), public_path('РЕЕСТР НАДЕЖНЫХ ПАРТНЕРОВ на 08 04 2022.xlsx'));
    }
}
