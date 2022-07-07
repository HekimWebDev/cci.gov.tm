<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\NewsCci;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class ChangeDateCciNewsCommand extends Command
{
    protected $signature = 'change:date:ccinews';

    protected $description = 'Command description';

    public function handle()
    {
        $date = NewsCci::get()->each(function ($q){
            $res = Str::replace('.', '-', $q->date);

            $q->publish_at = $res;
            $q->save();
        });
    }
}
