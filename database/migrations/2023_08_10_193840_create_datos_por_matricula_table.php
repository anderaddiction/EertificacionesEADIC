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
            $table->text('nombre')->nullable();
            $table->text('apellido')->nullable();
            $table->text('documento_de_identidad')->nullable();
            $table->text('email')->nullable();
            $table->unsignedBigInteger('id_master');
            $table->unsignedBigInteger('id_universities');
            $table->text('situacion_financiera')->nullable();
            $table->text('estado_matricula')->nullable();
            $table->text('modalidad_de_estudio')->nullable();
            $table->text('estado_formacion')->nullable();
            $table->text('edicion_master')->nullable();
            $table->text('codigo_de_edicion')->nullable();
            $table->text('numero_de_edicion')->nullable();
            $table->text('fecha_inicio')->nullable();
            $table->text('fecha_fin')->nullable();
            $table->text('numero_oportunidad')->nullable();
            $table->string('codigoUnicoEstudiante')->nullable();
            $table->string('nombreOportunidad')->nullable();
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
