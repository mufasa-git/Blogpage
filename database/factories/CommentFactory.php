<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
      'comment' => $faker->realText($maxNbChars = 200, $indexSize = 2),
      'createdAt' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '-6 months'),
    ];
});
