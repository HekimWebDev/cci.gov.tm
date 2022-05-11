<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('local_brands', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_tk')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('article')->nullable();
            $table->string('article_en')->nullable();
            $table->string('article_tk')->nullable();
            $table->string('thumbnail')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('local_brands');
    }
}
