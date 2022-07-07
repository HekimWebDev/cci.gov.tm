<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class ChangeDateCommand extends Command
{
    protected $signature = 'change:date';

    protected $description = 'Command description';

    public function handle()
    {
        $date = News::get()->each(function ($q){
            $res = Str::replace('.', '-', $q->date);

            $q->publish_at = $res;
            $q->save();
        });
    }
}
