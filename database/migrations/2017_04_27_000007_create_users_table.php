<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('photo',100);
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->integer('nomina')->unique();
            $table->string('plaza');

            /* Foreign key ------------------------ */
            $table->integer('area')->unsigned();
            $table->integer('posicion_track')->unsigned();
            $table->integer('company')->unsigned();
            /* ------------------------------------ */

            $table->date('fecha_ingreso');
            $table->date('fecha_baja')->nullable();
            $table->enum('tipo_baja',['Voluntaria', 'Involuntaria'])->nullable();
            $table->string('motivo')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('area')->references('id')->on('areas');
            $table->foreign('posicion_track')->references('id')->on('posiciones_tracks');
            $table->foreign('company')->references('id')->on('companies');
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
        Schema::dropIfExists('users');
    }
}
