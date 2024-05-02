<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("moviename");
            $table->string("description");
            $table->string("releasedate");
            $table->string("genre");
            $table->string("type");
            $table->string("length");
            $table->string("trailerlink");
            $table->string("slug");
            $table->string("rating");
            $table->string("cast");
            $table->string("image");
            $table->string("lang");
            $table->string("imdb");
            $table->string("rt");
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
        Schema::dropIfExists('movies');
    }
}
