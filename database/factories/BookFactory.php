<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'annotation' => $faker->realText(200),
        'price' => rand(0, 2000),
        'isbn' => $faker->isbn13,
        'year' => rand(1890, 2018),
        'publisher_id' => rand(1, 10),
        'published_date' => $faker->date(),
        'published_time' => $faker->time(),
        'is_active' => 1,
        'script' => 'Latin',
    ];
});
