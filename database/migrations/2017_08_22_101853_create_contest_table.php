<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest',function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->string('title');
           $table->text('description')->nullable();
           $table->text('notification')->nullable();
           $table->timestamp('started_at');
           $table->timestamp('ended_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest');
    }
}
