<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_area', function (Blueprint $table) {
            $table->increments('id');

            /* foreign key ------------------------ */
            $table->integer('permiso')->unsigned();
            $table->integer('area')->unsigned();
            /* ------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('permiso')->references('id')->on('permisos');
            $table->foreign('area')->references('id')->on('areas');
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
        Schema::dropIfExists('permisos_area');
    }
}
