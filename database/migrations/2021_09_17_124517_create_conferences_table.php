<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('name_tk');
            $table->string('name_en');
            $table->string('title');
            $table->string('title_tk');
            $table->string('title_en');
            $table->text('desc');
            $table->text('desc_tk');
            $table->text('desc_en');
            $table->text('content');
            $table->text('content_tk');
            $table->text('content_en');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferences');
    }
}
