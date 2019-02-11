<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(App\Event::class, function (Faker $faker) {

    $startingDate = \Carbon\Carbon::now()->setTime($faker->numberBetween(1,24),0,0)->addDays($faker->numberBetween(1,9));
    $endingDate   = $startingDate->copy()->addDays($faker->numberBetween(0,1))->addHours($faker->numberBetween(1,24));
    return [
        'title' => $faker->sentence(5),
        'description'=> $faker->paragraph(2),
        'start_date' => $startingDate->toDateTimeString(),
        'end_date' => $endingDate->toDateTimeString(),
        'accepted' => $faker->boolean()
    ];
});
