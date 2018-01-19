<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3, false),
        'price' => $faker->randomFloat(2, 50),
        'description' => $faker->sentence(20, true),
        'number' => $faker->numberBetween(1,200),
    ];
});
