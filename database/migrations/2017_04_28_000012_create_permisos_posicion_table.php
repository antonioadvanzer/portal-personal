<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosPosicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_posicion', function (Blueprint $table) {
            $table->increments('id');

            /* foreign key ------------------------ */
            $table->integer('permiso')->unsigned();
            $table->integer('posicion')->unsigned();
            /* ------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('permiso')->references('id')->on('permisos');
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
        Schema::dropIfExists('permisos_posicion');
    }
}
