<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat(2, 50),
        'description' => $faker->sentence(20, true),
        'number' => $faker->numberBetween(1,200),
    ];
});
