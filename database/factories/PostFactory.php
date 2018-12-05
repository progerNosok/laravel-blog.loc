<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word,
        'slug' => $faker->unique()->word,
        'content' => $faker->sentence,
        'image' => 'ahawxQrOrsa2qZaBQGr1.jpeg',
        'description' => $faker->sentence,
        'category_id' => 1,
//        'tags' => [1],
        'user_id' => 1
    ];
});
