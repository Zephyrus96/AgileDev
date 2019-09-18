<?php

use Faker\Generator as Faker;
$factory->define(App\Project::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    return [
        'title' => $faker->word,
        'description' => $faker->text($maxNbChars = 150),
        'start_date' => $start,
        'end_date' => $faker->dateTimeBetween($start,$start->format('Y-m-d').'+7 days'),
        'duration' => $faker->numberBetween($min = 50 , $max = 250),
        'department' => $faker->word,
    ];
});