<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->String('type');
            $table->String('subject');
            $table->String('object_type');
            $table->String('object_type2')->nullable();
            $table->integer('object_id')->unsigned();
            $table->integer('object_id2')->unsigned()->nullable();
            $table->integer('object_id3')->unsigned()->nullabe();
            $table->String('object_name');
            $table->String('object_desc')->nullable();
            $table->String('object_desc2')->nullable();
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
        Schema::dropIfExists('histories');

    }
}
