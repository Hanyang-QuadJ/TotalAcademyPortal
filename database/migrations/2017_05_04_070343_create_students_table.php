<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
            $table->String('reason');
            $table->String('class');
            $table->String('parentPhone')->unique();
            $table->String('studentPhone')->unique();
            $table->integer('school_id')->unsigned();
            $table
                ->foreign('school_id')
                ->references('id')
                ->on('schools')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
