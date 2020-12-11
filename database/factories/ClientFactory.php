<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->text,
        'bdate' => $faker->word,
        'blood_type_id' => $faker->randomDigitNotNull,
        'last_donation_date' => $faker->randomDigitNotNull,
        'city_id' => $faker->randomDigitNotNull,
        'phone' => $faker->text,
        'password' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
