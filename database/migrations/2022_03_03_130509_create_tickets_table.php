<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('movieshowid');
            $table->foreign('movieshowid')->references('id')->on('movie_shows')->onUpdate('cascade')->onDelete('cascade');
            $table->string("normalprice");
            $table->string("executiveprice");
            $table->string("premiumprice");
            $table->string("seatnames");
            $table->string("totalseats");
            $table->date("bookingdate");
            $table->string("totalcost");
            $table->string("coupon");
            $table->string("totalpay");
            $table->string("Completed");
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
        Schema::dropIfExists('tickets');
    }
}
