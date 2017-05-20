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
$factory->define(App\School::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->locale.".학교"
    ];
});
$factory->define(App\Student::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name.".학생",
        'reason' => $faker->locale,
        'class' => $faker->company,
        'parentPhone' => $faker->phoneNumber,
        'studentPhone' => $faker->phoneNumber,
        'school_id' => $faker->numberBetween($min = 1, $max = 5),
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
        'fee' => $faker->numberBetween($min = 100000, $max = 900000),
        'semester_id' => $faker->numberBetween($min = 1, $max = 5),
        'teacher_id' => $faker->numberBetween($min = 1, $max = 10),

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
$factory->define(App\Exam::class, function (Faker\Generator $faker) {

    return [

        'name' => $faker->colorName."시험.",
    ];
});
$factory->define(App\CourseStudent::class, function (Faker\Generator $faker) {

    return [
        'student_id' => $faker->numberBetween($min = 1, $max = 30),
        'course_id' => $faker->numberBetween($min = 1, $max = 30),
        'fee' => $faker->numberBetween($min = 100000, $max = 900000),
    ];
});
$factory->define(App\ExamStudent::class, function (Faker\Generator $faker) {

    return [
        'exam_id' => $faker->numberBetween($min = 1, $max = 10),
        'student_id' => $faker->numberBetween($min = 1, $max = 30),
        'score' => $faker->numberBetween($min = 50, $max = 100),
    ];
});


