<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPorMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_por_matricula', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('apellido');
            $table->text('documento_de_identidad');
            $table->text('email');
            $table->unsignedBigInteger('id_master');
            $table->unsignedBigInteger('id_universities');
            $table->text('situacion_financiera');
            $table->text('estado_matricula');
            $table->text('modalidad_de_estudio');
            $table->text('estado_formacion');
            $table->text('edicion_master');
            $table->text('fecha_inicio');
            $table->text('fecha_fin');
            $table->text('numero_oportunidad');
            $table->timestamps();

            $table->foreign('id_master')->references('id')->on('masters');
            $table->foreign('id_universities')->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_por_matricula');
    }
}
