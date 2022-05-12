<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddFilesColumnFoExhibitionsTable extends Migration
{
    public function up()
    {
        Schema::table('foexhibitions', function (Blueprint $table) {
            $table->string('file')->nullable();
            $table->string('file_tk')->nullable();
            $table->string('file_en')->nullable();
        });
    }

    public function down()
    {
        Schema::table('foexhibitions', function (Blueprint $table) {
            $table->dropColumn('file');
            $table->dropColumn('file_en');
            $table->dropColumn('file_tk');
        });
    }
}
