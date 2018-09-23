<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Size::class, function (Faker $faker) {
    return [
        'dia' => $faker->randomFloat(3, 1, 3),
        'dec' => $faker->randomFloat(3, 1, 3),
        'flute_length' => $faker->randomFloat(3, 1, 3),
        'shank_dia' => $faker->randomFloat(3, 1, 3),
        'oal' => $faker->randomFloat(3, 1, 3),
        'flutes' => $faker->randomNumber(1),
    ];
});
