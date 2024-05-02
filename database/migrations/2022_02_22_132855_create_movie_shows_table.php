<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_shows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movieid');
            $table->foreign('movieid')->references('id')->on('movies')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('multiplexid');
            $table->foreign('multiplexid')->references('id')->on('multiplexes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('screenid');
            $table->foreign('screenid')->references('id')->on('screens')->onUpdate('cascade')->onDelete('cascade');
            $table->date("showdate");
            $table->time("showtime");
            $table->string("showtype");
            $table->string("showlang");
            $table->string("normalprice");
            $table->string("executiveprice");
            $table->string("premiumprice");
            $table->string("totalseats");
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
        Schema::dropIfExists('movie_shows');
    }
}
