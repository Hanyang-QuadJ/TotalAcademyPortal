<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,1)->create();
        factory(App\School::class,5)->create();
        factory(App\Student::class,30)->create();
        factory(App\Academy::class,3)->create();
        factory(App\Semester::class,5)->create();
        factory(App\Teacher::class,10)->create();
        factory(App\Course::class,30)->create();
        factory(App\Exam::class,10)->create();
        factory(App\CourseStudent::class,90)->create();
        factory(App\ExamStudent::class,200)->create();


    }
}
