<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCerficadoActivoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cerficado_activo_logs', function (Blueprint $table) {
            $table->id();
            $table->string('correo', 255);
            $table->string('master', 255)->nullable();
            $table->string('universidad_espanola', 255)->nullable();
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
        Schema::dropIfExists('cerficado_activo_logs');
    }
}
