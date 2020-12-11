<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClientNotification;
use Faker\Generator as Faker;

$factory->define(ClientNotification::class, function (Faker $faker) {

    return [
        'is_seen' => $faker->randomElement(['['true'', 'false']']),
        'client_id' => $faker->randomDigitNotNull,
        'notification_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
