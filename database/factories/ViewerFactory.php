<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Viewer;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Viewer::class, function (Faker $faker) {
    $deviceTypes = ['mobile', 'tablet', 'computer'];
    $countryList = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica"];
    $blog_id = Post::all()->pluck('id')->toArray();

    return [
          'post_id' => $faker->randomElement($blog_id),
          'country' => $faker->randomElement($countryList),
          'device_type' => $faker->randomElement($deviceTypes)
    ];
});
