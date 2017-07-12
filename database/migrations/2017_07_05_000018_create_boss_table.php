<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bosses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('boss')->unsigned(); // foreign key
            $table->integer('employed')->unsigned(); // foreign key 

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('boss')->references('id')->on('users');
            $table->foreign('employed')->references('id')->on('users');
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
        Schema::dropIfExists('bosses');
    }
}
