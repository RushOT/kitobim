<?php

use Faker\Generator as Faker;

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'birth_date' => $faker->date(),
        'death_date' => $faker->date(),
        'country' => $faker->country,
        'bio' => $faker->realText(300),
        'is_active' => 1,
    ];
});
