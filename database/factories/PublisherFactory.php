<?php

use Faker\Generator as Faker;

$factory->define(\App\Publisher::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->catchPhrase,
        'url' => $faker->domainName,
        'is_active' => 1,
    ];
});
