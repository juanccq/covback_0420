<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FichaPaciente;
use Faker\Generator as Faker;
use App\Medico;
use App\Paciente;
use App\Municipio;

$factory->define(FichaPaciente::class, function (Faker $faker) {
    return [
        'id'                        => $faker -> uuid,
        'fecha_registro'            => $faker -> dateTime,
        'medico_id'                 => Medico::all() -> random(),
        'paciente_id'               => Paciente::all() -> random(),
        'municipio_id'              => Municipio::all() -> random(),
        'enfermedades_antecedentes' => $faker -> sentence,
        'medicacion_actual'         => $faker -> sentence,
        'seguro_salud'              => $faker -> sentence,
        'convivientes'              => $faker -> sentence,
        'contacto_personas'         => $faker -> sentence,
        'sintomas'                  => $faker -> randomElement( FichaPaciente::$sintomas ),
        'diagnostico'               => $faker -> randomElement( FichaPaciente::$diagnostico ),
        'conducta'                  => $faker -> sentence,
        'seguimiento_paciente'      => $faker -> sentence,
        'observaciones'             => $faker -> sentence,
        'calles_frecuentadas'       => $faker -> sentence
    ];
});
