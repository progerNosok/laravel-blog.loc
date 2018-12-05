<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'slug' => $faker->unique()->word
    ];
});
