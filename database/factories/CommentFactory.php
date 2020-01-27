<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'detail' => $faker->paragraph,
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),

    ];
});
