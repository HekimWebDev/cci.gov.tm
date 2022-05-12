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
        Excel::import(new BrandsImport(), public_path('telekeciler.xlsx'));
    }
}
