<?php

use Faker\Generator as Faker;
use Faker\Provider\pl_PL as Pl;

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
        'name' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'firstname' => $faker->firstName(),
        'lastname'=> $faker->lastName(),
        'phone'=> $faker->unique()->phoneNumber(),
        'organization'=> $faker->company,
        'student_id'=> $faker->unique()->numberBetween(1000000, 3000000),
        'provider'=> ('facebook'),
        'provider_id' => $faker->numberBetween(100000000, 300000000),
        'password' => bcrypt($faker->password(8)),
        'remember_token' => str_random(10),
    ];
});
