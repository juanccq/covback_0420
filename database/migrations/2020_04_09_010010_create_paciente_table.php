<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->uuid('id') -> primary();
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('telefono', 50) -> nullable();
            $table->string('celular', 50) -> nullable();
            $table->string('direccion', 255);
            $table->string('zona', 255);
            $table->point('zona_lat_lng') -> nullable();
            $table->integer('edad');
            $table->smallInteger('sexo');
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
        Schema::dropIfExists('pacientes');
    }
}
