<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DonationOrder;
use Faker\Generator as Faker;

$factory->define(DonationOrder::class, function (Faker $faker) {

    return [
        'id' => $faker->word,
        'name' => $faker->word,
        'blood_count' => $faker->randomDigitNotNull,
        'hospital_address' => $faker->word,
        'phone' => $faker->word,
        'notes' => $faker->text,
        'city_id' => $faker->randomDigitNotNull,
        'blood_type_id' => $faker->randomDigitNotNull,
        'client_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
