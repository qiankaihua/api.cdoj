<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestcaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testcase', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('record_id');
            $table->integer('testdata_id');
            $table->integer('judge_result_id');
            $table->integer('diff_info_id');
            $table->integer('time_cost');
            $table->integer('memory_cost');
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
        Schema::dropIfExists('testcase');
    }
}
