<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\post::class, function (Faker $faker) {
    return [
        
        'last_name' 			=> $faker->word,
        'first_name' 			=> $faker->word,
        'phone_number' 			=> $faker->phoneNumber,
        'countryCode' 			=> $faker->countryCode,
        'avater' 				=> $faker->imageUrl($width = 200, $height = 200),
        'birth_date' 			=> $faker->date			,
        'email' 				=> $faker->unique()->safeEmail,

    ];
});
