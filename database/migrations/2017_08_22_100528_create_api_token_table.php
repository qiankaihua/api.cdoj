<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_token',function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->integer('user_id');
           $table->string('token')->comment('UNIQUE');
           $table->string('ip')->nullable()->comment('user client’s ip');
           $table->timestamp('expired_at')->nullable()->comment('expired time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_token');
    }
}
