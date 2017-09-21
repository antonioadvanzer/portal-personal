<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned(); // foreign key
            $table->string('receiver');
            $table->boolean('sueldo')->default(0);
            $table->boolean('imss')->default(0);
            $table->boolean('rfc')->default(0);
            $table->boolean('curp')->default(0);
            $table->boolean('antiguedad')->default(0);
            $table->boolean('puesto')->default(0);
            $table->boolean('domicilio_particular')->default(0);
            $table->string('observations')->nullable();
            $table->boolean('alert')->default(1);
            
            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('user')->references('id')->on('users');
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
         Schema::dropIfExists('letter');
    }
}
