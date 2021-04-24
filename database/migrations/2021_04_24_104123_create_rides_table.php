<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bus')->unsigned();
            $table->foreign('bus')
                  ->references('id')
                  ->on('buses')
                  ->onDelete('cascade');

            $table->bigInteger('departure_place')->unsigned();
            $table->foreign('departure_place')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade');

            $table->bigInteger('arrival_place')->unsigned();
            $table->foreign('arrival_place')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade');

            $table->integer('order');
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
        Schema::dropIfExists('rides');
    }
}
