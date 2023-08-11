<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_asignatura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_master');
            $table->unsignedBigInteger('id_asignatura');
            $table->string('nombre_master');
            $table->string('nombre_asignatura');
            $table->timestamps();
            $table->foreign('id_master')->references('id')->on('masters');
            $table->foreign('id_asignatura')->references('id')->on('asignatura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_asignatura');
    }
}
