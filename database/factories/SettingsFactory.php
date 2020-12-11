<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Settings;
use Faker\Generator as Faker;

$factory->define(Settings::class, function (Faker $faker) {

    return [
        'phone' => $faker->word,
        'fb_link' => $faker->text,
        'insta_link' => $faker->text,
        'ytb_link' => $faker->text,
        'email' => $faker->text,
        'twitter_link' => $faker->text,
        'about_us' => $faker->text,
        'notification_settings' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
