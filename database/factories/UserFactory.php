<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'username' => $faker->userName,
        'password' => Hash::make('test123'),
        'mobile' => $faker->unique()->randomNumber($nbDigits = 8),
        'email' => $faker->unique()->safeEmail,
        'position' => $faker->randomElement(['Scrum Master','Product Owner','Developer']),
        'email_verified_at' => now(),
        'remember_token' => str_random(10),
    ];
});
