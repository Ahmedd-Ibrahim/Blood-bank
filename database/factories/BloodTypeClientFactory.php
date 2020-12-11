<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BloodTypeClient;
use Faker\Generator as Faker;

$factory->define(BloodTypeClient::class, function (Faker $faker) {

    return [
        'blood_type_id' => $faker->randomDigitNotNull,
        'client_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
