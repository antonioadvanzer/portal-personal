<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->increments('id');
            
            /* foreign key ----------------------------------------------------------------- */
            $table->integer('user')->unsigned();
            $table->integer('type')->unsigned();
            /* --------------------------------------------------------------------------- */

            $table->integer('accumulated_days')->unsigned();
            $table->integer('increased_days')->unsigned();
            $table->integer('corresponding_days')->unsigned();
            
            $table->date('start_date');
            $table->date('close_date');
            $table->date('expiration_date');

            $table->integer('year')->unsigned();
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('type')->references('id')->on('tipos_dias');
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
        Schema::dropIfExists('vacaciones');
    }
}
