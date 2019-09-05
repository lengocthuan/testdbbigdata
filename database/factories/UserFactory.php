<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    // $hashed_random_password = Hash::make(str_random(10));

    // return [
    //     'username' => $faker->userName(),
    //     'email' => $faker->email(),
    //     'password' => $hashed_random_password, // password
    //     'birthday' => $faker->dateTimeThisDecade($max = 'now', $timezone = 'Asia/Ho_Chi_Minh'),
    //     'address' => $faker->address(),
    //     'fullname' => $faker->name($gender = 'male'|'female')
    // ];
});
