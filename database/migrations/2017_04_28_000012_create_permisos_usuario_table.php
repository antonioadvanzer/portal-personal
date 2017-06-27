<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_usuario', function (Blueprint $table) {
            $table->increments('id');

            /* foreign key ------------------------ */
            $table->integer('permiso')->unsigned();
            $table->integer('usuario')->unsigned();
            /* ------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('permiso')->references('id')->on('permisos');
            $table->foreign('usuario')->references('id')->on('users');
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
        Schema::dropIfExists('permisos_usuario');
    }
}
