<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    static $number = 1;
    $owner = $faker->numberBetween(1, 2);
    $number1 = $number++;
    $id=$faker->uuid;
    
    $email=$faker->unique()->safeEmail;
    switch ($number1) {
        case 2:
            $owner=1;
            $email='reseller@alisadomain.com'; 
            break;
        case 3:
            $owner=2;
            $email='admin@alisadomain.com'; 
            break;
    }
    switch ($number1) {
        case 2:
        case 3:
            $user = App\User::find($number1);
                $user->client_id=$id;
                $user->update();
            break;

        default:
            break;
    }
    return [
        'id' => $id,
        'social_reason' => $faker->company,
        'email' => $email,
        'phone' => $faker->phoneNumber,
        //'status' => $faker->numberBetween(-1,1),
        //'status' => $owner == 1 ? 1 : $faker->numberBetween(-1, 1),
        'status' => 1,
        //'type' => $faker->numberBetween(1,2),
        'type' => $owner == 1 ? 2 : 1,
        'owner' => $owner,
        'user_id' => $faker->numberBetween(1,3),
//        'owner' => App\User::all()->random(),
//        'user_id' => App\User::all()->random(),
    ];
});
