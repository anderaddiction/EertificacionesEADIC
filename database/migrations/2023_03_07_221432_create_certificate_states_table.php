<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_states', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique();
            $table->text('name')->unique();
            $table->text('note')->nullable();
            $table->integer('concept_id');
            $table->integer('status');
            $table->text('slug')->unique();
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
        Schema::dropIfExists('certificate_states');
    }
}
