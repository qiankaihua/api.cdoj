<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestXProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_x_problem',function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->integer('contest_id');
           $table->integer('problem_id');
           $table->string('alias')->nullable()->comment('alias title');
           $table->integer('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_x_problem');
    }
}
