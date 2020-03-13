<?php

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'detail' => $faker->paragraph,
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'created_at' => DateTime::dateTimeBetween('-5 days', 'now'),
        'updated_at' => Carbon::now(),
    ];
});
