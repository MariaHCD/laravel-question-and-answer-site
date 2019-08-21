<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'question_id' => $faker->numberBetween(1,5),
        'answer' => substr($faker->sentence(2), 0, -1)
    ];
});
