<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            /* foreign key ------------------------ */
            $table->integer('nivel')->unsigned();
            /* ------------------------------------ */
            
            $table->timestamps();
            $table->softDeletes();

             /* Relations ----------------------------------------------------------------- */
            $table->foreign('nivel')->references('id')->on('niveles');
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
        Schema::dropIfExists('posiciones');
    }
}
