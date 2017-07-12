<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicionesTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posiciones_tracks', function (Blueprint $table) {
            $table->increments('id');
            
            /* foreign key ------------------------ */
            $table->integer('track')->unsigned();
            $table->integer('posicion')->unsigned();
            /* ------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('track')->references('id')->on('tracks');
            $table->foreign('posicion')->references('id')->on('posiciones');
            /* --------------------------------------------------------------------------- */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posiciones_tracks');
    }
}
