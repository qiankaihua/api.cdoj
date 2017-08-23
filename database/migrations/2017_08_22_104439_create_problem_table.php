<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('input')->nullable();
            $table->text('output')->nullable();
            $table->json('samples')->nullable();
            $table->text('hint')->nullable();
            $table->string('source')->nullable();
            $table->integer('time_limit')->default(1000)->comment('MS');
            $table->integer('memory_limit')->default(65536)->comment('KB');
            $table->integer('output_limit')->default(16384)->comment('KB');
            $table->boolean('isSpj')->default(false);
            $table->boolean('isVisible')->default(false);
            $table->integer('difficulty')->nullable();
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
        Schema::dropIfExists('problem');
    }
}
