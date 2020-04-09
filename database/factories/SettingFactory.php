<?php

use Faker\Generator as Faker;

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'auth_number' => $faker->numberBetween(100, 30000),
        'gen_key' => $faker->numberBetween(100, 30000),
        'start_rank' => $faker->numberBetween(1, 100),
        'end_rank' => $faker->numberBetween(200, 300),
        'correlative' => $faker->numberBetween(1, 100),
        'active' => $faker->randomElement([true, false]),
        'date_limit' => $faker->dateTimeBetween("-1 years", "now"),
        'company_name' => $faker->company,
        'company_slogan' => $faker->paragraph(1),
        'company_slogan2' => $faker->paragraph(1),
        'company_address' => $faker->address,
        'company_nit' => $faker->numberBetween(100, 30000),
        'company_social_reason' => $faker->company,
        'company_activity' => $faker->paragraph(1),
        'company_legend' => $faker->paragraph(1),
        'company_email_pdf' => $faker->unique()->safeEmail,
        'type' => $faker->numberBetween(1, 2),
        'client_id' => $client=App\Client::where('type','=','1')->get()->random(),
        'owner' => 3,
        'user_id' => App\User::all()->random(),
    ];
});
