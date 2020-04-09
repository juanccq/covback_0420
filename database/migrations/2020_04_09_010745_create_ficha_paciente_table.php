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
        Schema::create('ficha_pacientes', function (Blueprint $table) {
            $table->uuid('id') -> primary();
            $table->dateTime('fecha_registro');
            $table->uuid('medico_id');
            $table->uuid('paciente_id');
            $table->uuid('municipio_id');
            $table->text('enfermedades_antecedentes');
            $table->text('medicacion_actual') -> nullable();
            $table->string('seguro_salud') -> nullable();
            $table->text('convivientes');
            $table->text('contacto_personas');
            $table->string('sintomas');
            $table->string('diagnostico');
            $table->text('conducta');
            $table->text('seguimiento del paciente');
            $table->text('observaciones');
            $table->text('calles_frecuentadas');
            $table->multiPoint('calles_lat_lng') -> nullable();
            $table->timestamps();
            
            # foreign keys
            $table->foreign('medico_id') -> references('id') -> on('medicos');
            $table->foreign('paciente_id') -> references('id') -> on('pacientes');
            $table->foreign('municipio_id') -> references('id') -> on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_pacientes', function (Blueprint $table) {
            $table -> dropForeign( 'ficha_pacientes_medico_id_foreign' );
            $table -> dropForeign( 'ficha_pacientes_paciente_id_foreign' );
            $table -> dropForeign( 'ficha_pacientes_municipio_id_foreign' );
        });
        
        Schema::dropIfExists('ficha_pacientes');
    }
}
