<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BloodType;
use Faker\Generator as Faker;

$factory->define(BloodType::class, function (Faker $faker) {

    return [
        'type' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
