<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_paciente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_registro');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('municipio_id');
            $table->text('enfermedades_antecedentes');
            $table->text('medicacion_actual');
            $table->string('seguro_salud');
            $table->text('convivientes');
            $table->text('contacto_personas');
            $table->string('sintomas');
            $table->string('diagnostico');
            $table->text('conducta');
            $table->text('seguimiento del paciente');
            $table->text('observaciones');
            $table->text('calles_frecuentadas');
            $table->multiPoint('calles_lat_lng');
            $table->timestamps();
            
            # foreign keys
            $table->foreign('medico_id') -> references('id') -> on('medico');
            $table->foreign('paciente_id') -> references('id') -> on('paciente');
            $table->foreign('municipio_id') -> references('id') -> on('municipio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_paciente', function (Blueprint $table) {
            $table -> dropColumn( 'medico_id' );
            $table -> dropColumn( 'paciente_id' );
            $table -> dropColumn( 'municipio_id' );
        });
        
        Schema::dropIfExists('ficha_paciente');
    }
}
