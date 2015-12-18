<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->integer('age');
            $table->string('password');
            $table->enum('role', ['admin', 'user', 'developer'])->default('user');
            $table->string('street', 60)->nullable();
            $table->string('ext_num', 10)->nullable();
            $table->string('int_num', 10)->nullable();
            $table->string('settlement', 30)->nullable();
            $table->string('town', 40)->nullable();
            $table->string('estate', 40)->nullable();
            $table->string('zip_code', 5)->nullable();
            $table->boolean('level_unblocked')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
