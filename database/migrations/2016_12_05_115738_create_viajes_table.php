<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('origen');
            $table->string('destino');
            $table->integer('coche');
            $table->integer('plataforma');
            $table->string('fecha');
            $table->string('hora');
            $table->string('demora');
            $table->string('tipo_uso');
            $table->boolean('baja')->default(0);
            $table->timestamp('fecha_creacion')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('viajes');
    }
}
