<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->uuid('id') -> primary();
            $table->integer('numero_departamento');
            $table->string('departamento',255);
            $table->string('provincia',255);
            $table->integer('numero_municipio');
            $table->string('municipio',255);
            $table->string('circunscripccion',255);
            $table->string('localidad',255);
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
        Schema::dropIfExists('municipios');
    }
}
