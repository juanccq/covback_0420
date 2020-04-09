<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'id'            => $faker -> uuid,
        'nombre'        => $faker -> firstName,
        'paterno'       => $faker -> lastName,
        'materno'       => $faker -> lastName,
        'telefono'      => $faker -> phoneNumber,
        'celular'       => $faker -> phoneNumber,
        'direccion'     => $faker -> address,
        'zona'          => $faker -> streetName,
//        'zona_lat_lng'  => 'GeomFromText(\'POINT('.$faker -> latitude .' ' . $faker -> longitude.')\')',
        'edad'          => $faker -> numberBetween(0,110),
        'sexo'          => $faker -> randomElement([0,1])
    ];
});
