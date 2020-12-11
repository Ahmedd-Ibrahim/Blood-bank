<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Governorate;
use Faker\Generator as Faker;

$factory->define(Governorate::class, function (Faker $faker) {

    return [
        'name' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
