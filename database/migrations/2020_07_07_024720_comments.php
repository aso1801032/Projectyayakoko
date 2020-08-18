<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->unsignedInteger('thread_id');
            $table->string('thread_num');
            $table->unsignedInteger('com_num',1000)->autoIncrement();
            $table->string('name');
            $table->string('use_id',8);
            $table->string('comment');
            $table->timestamp('created_at');
            $table->boolean('hide_setting');
            $table->integer('high_rating');
            $table->integer('low_rating');
            $table->foreign('thread_id')->references('id')->on('threads');
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
