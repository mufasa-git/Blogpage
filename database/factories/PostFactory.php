<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
  $user_id = User::all()->pluck('id')->toArray();

  return [
      'user_id' => $faker->randomElement($user_id),
      'title' => $faker->realText($maxNbChars = 16, $indexSize = 2),
      'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
      'createdAt' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '-6 months'),
      'updatedAt' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now'),
  ];
});
