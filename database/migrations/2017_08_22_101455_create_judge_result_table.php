<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgeResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('en');
            $table->string('color');
            $table->timestamps();
        });
        DB::table('judge_result')->insert([
            [
                'alias'     => 'Pending',
                'en'        => 'Pending',
                'color'     => '#9e9e9e',
            ],
            [
                'alias'     => 'Judging',
                'en'        => 'Judging',
                'color'     => '#2196f3',
            ],
            [
                'alias'     => 'AC',
                'en'        => 'Accepted',
                'color'     => '#4caf50',
            ],
            [
                'alias'     => 'PE',
                'en'        => 'Presentation Error',
                'color'     => '#ff9800',
            ],
            [
                'alias'     => 'WA',
                'en'        => 'Wrong Answer',
                'color'     => '#f44336',
            ],
            [
                'alias'     => 'OLE',
                'en'        => 'Output Limit Exceeded',
                'color'     => '#e91e63',
            ],
            [
                'alias'     => 'TLE',
                'en'        => 'Time Limit Exceeded',
                'color'     => '#9c27b0',
            ],
            [
                'alias'     => 'MLE',
                'en'        => 'Memory Limit Exceeded',
                'color'     => '#673ab7',
            ],
            [
                'alias'     => 'CE',
                'en'        => 'Compilation Error',
                'color'     => '#ffeb3b',
            ],
            [
                'alias'     => 'RE',
                'en'        => 'Runtime Error',
                'color'     => '#ff5722',
            ],
            [
                'alias'     => 'SE',
                'en'        => 'System Error',
                'color'     => '#000000',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judge_result');
    }
}
