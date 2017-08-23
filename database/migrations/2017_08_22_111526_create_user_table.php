<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('role_id')->default(3);
            $table->string('email')->unique();
            $table->string('school')->nullable();
            $table->integer('department_id')->default(1);
            $table->string('nickname')->nullable();
            $table->string('realname')->nullable();
            $table->text('motto')->nullable();
            $table->integer('grade_id')->default(4);
            $table->boolean('gender')->default(false)->comment('0(false) for male, 1(true) for female');
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
        Schema::dropIfExists('user');
    }
}
