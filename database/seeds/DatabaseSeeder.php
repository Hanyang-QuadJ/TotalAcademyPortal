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
        // $this->call(UsersTableSeeder::class);

        factory(App\Student::class,20)->create();
        factory(App\Academy::class,3)->create();
        factory(App\Course::class,30)->create();
        factory(App\Teacher::class,10)->create();
    }
}
