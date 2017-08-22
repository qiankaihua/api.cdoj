<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('problem_id');
            $table->integer('contest_id')->nullable();
            $table->integer('compile_info_id')->nullable();
            $table->integer('language_id');
            $table->integer('code_id');
            $table->integer('judge_result_id');
            $table->integer('time_cost')->nullable();
            $table->integer('memory_cost')->nullable();
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
        Schema::dropIfExists('record');
    }
}
