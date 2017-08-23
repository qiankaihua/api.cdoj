<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade',function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->string('name');
        });
        DB::table('grade')->insert([
            [
                'name' => 'Senior One',
            ],
            [
                'name' => 'Senior Two',
            ],
            [
                'name' => 'Senior Three',
            ],
            [
                'name' => 'Freshman',
            ],
            [
                'name' => 'Sophomore',
            ],
            [
                'name' => 'Junior',
            ],
            [
                'name' => 'Fourth year of university',
            ],
            [
                'name' => 'Graduate',
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
        Schema::dropIfExists('grade');
    }
}
