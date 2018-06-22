<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'details' => $faker->paragraph,
        'price' => $faker->numberBetween(10, 1000),
        'stock' => $faker->randomDigit,
        'discount' => $faker->numberBetween(0, 90)
    ];
});
