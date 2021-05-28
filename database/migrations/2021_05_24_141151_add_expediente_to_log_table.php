<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpedienteToLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->unsignedBigInteger('expediente')->nullable();
            $table->foreign('expediente')->references('expediente_id')->on('expedientes');
            $table->unsignedBigInteger('type')->nullable();
            $table->foreign('type')->references('tipo_expediente_id')->on('tipos_expedientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            //
        });
    }
}
