<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasPorMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_por_matricula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_datos_por_matricula');
            $table->string('asignaturas_1');
            $table->string('asignaturas_2');
            $table->string('asignaturas_3');
            $table->string('asignaturas_4');
            $table->string('asignaturas_5');
            $table->string('asignaturas_6');
            $table->string('asignaturas_7');
            $table->string('asignaturas_8');
            $table->string('asignaturas_9');
            $table->integer('modulos_1');
            $table->integer('modulos_2');
            $table->integer('modulos_3');
            $table->integer('modulos_4');
            $table->integer('modulos_5');
            $table->integer('modulos_6');
            $table->integer('modulos_7');
            $table->integer('modulos_8');
            $table->integer('modulos_9');
            $table->string('estado_1');
            $table->string('estado_2');
            $table->string('estado_3');
            $table->string('estado_4');
            $table->string('estado_5');
            $table->string('estado_6');
            $table->string('estado_7');
            $table->string('estado_8');
            $table->string('estado_9');
            $table->string('baremos_1');
            $table->string('baremos_2');
            $table->string('baremos_3');
            $table->string('baremos_4');
            $table->string('baremos_5');
            $table->string('baremos_6');
            $table->string('baremos_7');
            $table->string('baremos_8');
            $table->string('baremos_9');
            $table->integer('bloqueado');
            $table->timestamps();

            $table->foreign('id_datos_por_matricula')->references('id')->on('datos_por_matricula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas_por_matricula');
    }
}
