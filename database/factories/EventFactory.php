<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Event::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeThisYear('+1 month');
    $endingDate   = strtotime('+1 Week', $startingDate->getTimestamp());
    return [
        'title' => 'Rezerwacja xyz',
        'description'=> $faker->text(100),
        'start_date' => $startingDate,
        'end_date' => $endingDate,
        'accepted' => $faker->boolean()
    ];
});
