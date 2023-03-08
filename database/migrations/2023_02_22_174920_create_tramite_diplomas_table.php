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
            $table->integer('universidad_id')->unsigned()->nulable();
            $table->string('edicio', 250)->nulable();
            $table->string('diploma_en_eadic', 250)->nulable();
            $table->string('fecha_llegada', 250)->nulable();
            $table->string('master_code', 250)->nulable();
            $table->string('codigoed', 250)->nulable();
            $table->string('nombre', 250)->nulable();
            $table->string('apellido', 250)->nulable();
            $table->string('dni', 250)->nulable();
            $table->string('observaciones', 250)->nulable();
            $table->string('correo', 250)->nulable();
            $table->string('usuario_plataforma', 250)->nulable();
            $table->integer('estado_diploma_id')->unsigned()->nulable();
            $table->string('incidencia', 250)->nulable();
            $table->integer('estado_certificado_nota_id')->nulable();
            $table->string('obs_incidencia')->nulable();
            $table->integer('categoria_id')->unsigned()->nulable();
            $table->string('ticket_diplomaynota', 250)->unique()->nulable();
            $table->string('ticket_solonotas', 250)->nulable();
            $table->string('obs_tramite', 250)->nulable();
            $table->string('pago_envionacional', 250)->nulable();
            $table->string('direccion_envio', 250)->nulable();
            $table->string('pais', 250)->nulable();
            $table->string('fecha_envio', 250)->nulable();
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
