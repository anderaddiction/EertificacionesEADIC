<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_activos', function (Blueprint $table) {
            $table->id();
            $table->string('oportunidades_nombre_contacto', 255);
            $table->string('oportunidades_situacion_financiera', 255);
            $table->string('oportunidades_estado_matriculación', 255);
            $table->string('estado_formacion', 255);
            $table->string('universidad_italiana', 255);
            $table->string('universidad_espanola', 255);
            $table->string('modalidad_de_estudio', 255);
            $table->string('correo', 255);
            $table->date('inicio_edicion');
            $table->date('fin_de_edicion');
            $table->string('estado_univ_espanola', 255);
            $table->string('estado_univ_italiana', 255);
            $table->string('contactos_n_identificacion', 255);
            $table->string('tipo_de_oportunidad', 255);
            $table->string('codigo_de_producto', 255);
            $table->string('nombre_producto', 255);
            $table->string('numero_serie_del_producto', 255);
            $table->string('numero_producto', 255);
            $table->string('estado_de_generacion', 255);
            $table->date('fecha_generacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_activos');
    }
}
