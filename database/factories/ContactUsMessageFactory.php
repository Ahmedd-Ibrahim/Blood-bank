<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContactUsMessage;
use Faker\Generator as Faker;

$factory->define(ContactUsMessage::class, function (Faker $faker) {

    return [
        'title' => $faker->text,
        'message' => $faker->word,
        'client_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
