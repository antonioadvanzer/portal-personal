<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned(); // foreign key
            $table->integer('director')->unsigned(); // foreign key
            $table->integer('partner_director')->unsigned(); // foreign key
            $table->date('fecha_solicitud');
            $table->date('fecha_estimada_ingreso');
            $table->date('fecha_aceptacion')->nullable();
            $table->date('fecha_autorizacion')->nullable();
            $table->integer('area')->unsigned(); // foreign key
            $table->integer('track')->unsigned(); // foreign key
            $table->integer('posicion')->unsigned(); // foreign key
            $table->integer('company')->unsigned(); // foreign key
            
            $table->string('tipo_posicion');
            $table->string('sustituye_a')->nullable();
            $table->string('costo_maximo');
            $table->string('proyecto');
            $table->string('clave_proyecto');
            $table->string('residencia');
            $table->string('lugar_trabajo');
            $table->string('domicilio_cliente')->nullable();
            $table->string('contratacion');
            $table->string('evaluador_tecnico');
            $table->string('disponibilidad_viajar');
            $table->string('edad_uno');
            $table->string('edad_dos');
            $table->string('sexo');    
            $table->string('nivel_estudios');
            $table->string('carrera');
            $table->string('ingles_oral');
            $table->string('ingles_lectura');
            $table->string('ingles_escritura');

            $table->string('conocimientos', 3000);
            $table->string('habilidades', 3000);
            $table->string('funciones', 3000);
            $table->string('observaciones', 3000);
            
            $table->string('razon_cancelacion')->nullable();
            $table->integer('status')->unsigned(); // foreign key
            $table->boolean('auth_boss')->default(0);
            $table->boolean('auth_director')->default(0);
            $table->boolean('alert')->default(1);

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('director')->references('id')->on('users');
            $table->foreign('partner_director')->references('id')->on('users');
            $table->foreign('area')->references('id')->on('areas');
            $table->foreign('track')->references('id')->on('tracks');
            $table->foreign('posicion')->references('id')->on('posiciones');
            $table->foreign('company')->references('id')->on('companies');
            $table->foreign('status')->references('id')->on('estados_requisicion');
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
        Schema::dropIfExists('requisiciones');
    }
}
