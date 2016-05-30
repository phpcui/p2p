<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atts', function (Blueprint $table) {
            $table->increments('aid');
            $table->integer('uid');
            $table->integer('pid');
            $table->tinyinteger('salary');
            $table->string('title',60);
            $table->string('jobcity',20);
            $table->string('udesc',500);
            $table->string('realname',40);
            $table->enum('gender',['男','女']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('atts');
    }
}
