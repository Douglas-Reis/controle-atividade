<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'description' => $faker->sentence(),
    ];
});
