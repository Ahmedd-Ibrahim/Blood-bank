<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClientGovernorate;
use Faker\Generator as Faker;

$factory->define(ClientGovernorate::class, function (Faker $faker) {

    return [
        'client_id' => $faker->randomDigitNotNull,
        'governorate_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
