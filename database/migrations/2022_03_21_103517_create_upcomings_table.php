<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomings', function (Blueprint $table) {
            $table->id();
            $table->string("moviename");
            $table->string("description");
            $table->string("releasedate");
            $table->string("genre");
            $table->string("type");
            $table->string("trailerlink");
            $table->string("slug");
            $table->string("cast");
            $table->string("image");
            $table->string("lang");
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
        Schema::dropIfExists('upcomings');
    }
}
