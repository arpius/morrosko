<?php

use Faker\Generator as Faker;

$factory->define(App\Exercise::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5, false),
        'description' => $faker->text(100),
        'series' => $faker->numberBetween(1, 5),
        'replays' => $faker->numberBetween(1, 10),
        'muscle_group_id' => $faker->numberBetween(1, 3)
    ];
});
