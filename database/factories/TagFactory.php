<?php

use Faker\Generator as Faker;

$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'slug' => $faker->unique()->word
    ];
});
