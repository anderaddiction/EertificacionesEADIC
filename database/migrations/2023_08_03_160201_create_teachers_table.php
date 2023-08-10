<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email_alumno');
            $table->string('name_alumno');
            $table->integer('DNI_alumno');
            $table->string('master_maerop');
            $table->string('universidad');
            $table->string('situacion_financiera');
            $table->string('asignaturas_1');
            $table->string('asignaturas_2');
            $table->string('asignaturas_3');
            $table->string('asignaturas_4');
            $table->string('asignaturas_5');
            $table->string('asignaturas_6');
            $table->string('asignaturas_7');
            $table->string('asignaturas_8');
            $table->string('asignaturas_9');
            $table->boolean('modulos_1')->default(false);
            $table->boolean('modulos_2')->default(false);
            $table->boolean('modulos_3')->default(false);
            $table->boolean('modulos_4')->default(false);
            $table->boolean('modulos_5')->default(false);
            $table->boolean('modulos_6')->default(false);
            $table->boolean('modulos_7')->default(false);
            $table->boolean('modulos_8')->default(false);
            $table->boolean('modulos_9')->default(false);
            $table->boolean('estado_1')->default(false);
            $table->boolean('estado_2')->default(false);
            $table->boolean('estado_3')->default(false);
            $table->boolean('estado_4')->default(false);
            $table->boolean('estado_5')->default(false);
            $table->boolean('estado_6')->default(false);
            $table->boolean('estado_7')->default(false);
            $table->boolean('estado_8')->default(false);
            $table->boolean('estado_9')->default(false);
            $table->boolean('baremos_1')->default(false);
            $table->boolean('baremos_2')->default(false);
            $table->boolean('baremos_3')->default(false);
            $table->boolean('baremos_4')->default(false);
            $table->boolean('baremos_5')->default(false);
            $table->boolean('baremos_6')->default(false);
            $table->boolean('baremos_7')->default(false);
            $table->boolean('baremos_8')->default(false);
            $table->boolean('baremos_9')->default(false);
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
        Schema::dropIfExists('teachers');
    }
}
