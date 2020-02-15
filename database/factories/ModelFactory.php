<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use App\Domain;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(Domain::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content_length' => '1000',
        'status_code' => $faker->numberBetween($min = 200, $max = 500) ,
        'body' => $faker->randomHtml(),
        'h1' => $faker->text(),
        'keywords' => $faker->text(),
        'description' => $faker->text()
    ];
});
