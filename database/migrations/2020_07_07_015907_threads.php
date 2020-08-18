<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Threads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',50);
            $table->string('content',400);
            $table->unsignedInteger('tag_id')->nullable($value = true);
            $table->string('username',200);
            $table->timestamps();
            $table->unsignedInteger('com_sum')->nullable($value = true);
            $table->foreign('tag_id')->references('id')->on('tags');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
