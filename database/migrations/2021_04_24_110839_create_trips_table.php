<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reservation')->unsigned();
            $table->foreign('reservation')
                  ->references('id')
                  ->on('reservations')
                  ->onDelete('cascade');
            $table->bigInteger('route')->unsigned();
            $table->foreign('route')
                  ->references('id')
                  ->on('rides')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('trips');
    }
}
