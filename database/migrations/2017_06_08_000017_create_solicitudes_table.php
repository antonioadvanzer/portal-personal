<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned(); // foreign key
            $table->integer('authorizer')->unsigned(); // foreign key
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_regreso');
            $table->string('voucher')->nullable();
            $table->string('observations');
            $table->string('razon_cancelacion')->nullable();
            $table->integer('status')->unsigned();// foreign key
            $table->integer('dias')->unsigned();
            $table->integer('type')->unsigned();// foreign key
            $table->integer('motivo')->unsigned();// foreign key
            $table->boolean('auth_boss')->default(0);
            $table->boolean('auth_ch')->default(0);
            $table->boolean('alert')->default(1);
            $table->boolean('used')->default(1);

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('autorizer')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('estados_solicitud');
            $table->foreign('type')->references('id')->on('tipo_solicitud');
            $table->foreign('motivo')->references('id')->on('motivos_ausencia');
            /* --------------------------------------------------------------------------- */

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
