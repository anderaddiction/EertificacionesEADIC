<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramiteDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramite_diplomas', function (Blueprint $table) {
            $table->id();
            $table->string('UNIVERSIDAD', 250)->nulable();
            $table->string('EDICION', 250)->nulable();
            $table->string('DIPLOMA_EN_EADIC', 250)->nulable();
            $table->string('FECHA_LLEGADAEADIC', 250)->nulable();
            $table->string('MASTER', 250)->nulable();
            $table->string('CODIGOED', 250)->nulable();
            $table->string('NOMBRES', 250)->nulable();
            $table->string('APELLIDOS', 250)->nulable();
            $table->string('DNI', 250)->nulable();
            $table->string('OBSERVACIONES', 250)->nulable();
            $table->string('CORREO', 250)->nulable();
            $table->string('USUARIO_PLATAFORMA', 250)->nulable();
            $table->string('ESTADO_DIPLOMA', 250)->nulable();
            $table->string('INCIDENCIAS', 250)->nulable();
            $table->string('ESTADO_CERTIFICADO_NOTAS', 250)->nulable();
            $table->string('OBS_INCIDENCIA', 250)->nulable();
            $table->string('CATEGORIA_ID', 250)->nulable();
            $table->string('TICKET_DIPLOMAYNOTAS', 250)->unique()->nulable();
            $table->string('TICKET_SOLONOTAS', 250)->nulable();
            $table->string('OBS_TRAMITE', 250)->nulable();
            $table->string('PAGO_ENVIONACIONAL', 250)->nulable();
            $table->string('DIRECCION_ENVIO', 250)->nulable();
            $table->string('PAIS', 250)->nulable();
            $table->string('FECHA_ENVIO', 250)->nulable();
            $table->softDeletes();
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
        Schema::dropIfExists('tramite_diplomas');
    }
}
