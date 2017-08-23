<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name');
            $table->string('extension');
            $table->integer('time_factor')->default(1)->comment('real_time_limit = time_limit * time_factor');
            $table->integer('memory_factor')->default(1)->comment('real_memory_limit = memory_limit * memory_factor');
            $table->timestamps();
        });
        DB::table('language')->insert([
            [
                'display_name' => 'C',
                'extension' => 'c',
                'time_factor' => '1',
                'memory_factor' => '1',
            ],
            [
                'display_name' => 'C++',
                'extension' => 'cc',
                'time_factor' => '1',
                'memory_factor' => '1',
            ],
            [
                'display_name' => 'Java',
                'extension' => 'java',
                'time_factor' => '3',
                'memory_factor' => '3',
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
        Schema::dropIfExists('language');
    }
}
