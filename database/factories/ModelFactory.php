<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => "admin@gmail.com",
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Student::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".학생",
    ];
});
$factory->define(App\Academy::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".학원",
    ];
});
$factory->define(App\Course::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".강좌",
    ];
});
$factory->define(App\Teacher::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".강사",
    ];
});
$factory->define(App\Semester::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".학기",
    ];
});
