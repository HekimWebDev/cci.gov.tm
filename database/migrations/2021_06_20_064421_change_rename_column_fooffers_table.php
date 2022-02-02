<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRenameColumnFooffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fooffers', function (Blueprint $table) {
            $table->renameColumn('title', 'desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fooffers', function (Blueprint $table) {
            $table->renameColumn('desc', 'title');
        });
    }
}
