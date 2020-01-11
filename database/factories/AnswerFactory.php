<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(3, 7), true),
        'user_id' => App\User::pluck('id')->random(),
//        'votes_count' => rand(-3,7),
//        'question_id' => App\Question::pluck('id')->random()
    ];
});
