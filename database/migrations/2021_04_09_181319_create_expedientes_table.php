<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('expediente_id');
            $table->string('num_caja',15);
            $table->unsignedBigInteger('tipo_exp');
            $table->foreign('tipo_exp')->references('tipo_expediente_id')->on('tipos_expedientes');
            $table->bigInteger('num_exp');
            $table->string('n_junta');
            $table->string('ano');
            $table->string('adicional');
            $table->string('actor');
            $table->string('demandado');
            $table->string('concepto');
            $table->string('procedencia');
            $table->string('tiempo_archivo');
            $table->bigInteger('num_legajos');
            $table->bigInteger('num_hojas');
            $table->string('observaciones');
            $table->date('fecha_obs');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::dropIfExists('expedientes');
    }
}
