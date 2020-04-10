<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medico;
use Faker\Generator as Faker;

$factory->define(Medico::class, function (Faker $faker) {
    return [
        'id'            => $faker -> uuid,
        'nombre'        => $faker -> firstName,
        'paterno'       => $faker -> lastName,
        'materno'       => $faker -> lastName,
        'especialidad'  => $faker -> randomElement(['Alergología','Anestesiología','Cardiología','Gastroenterología','Endocrinología','Epidemiología','Geriatría','Nefrología']),
        'telefono'      => $faker -> phoneNumber,
    ];
});
