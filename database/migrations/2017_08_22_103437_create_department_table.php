<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department',function (Blueprint $table) {
           $table->increments('id');
           $table->timestamps();
           $table->string('name');
        });
        DB::table('department')->insert([
            [
                'name' => 'Others',
            ],
            [
                'name' => 'School of Information and Software Engineering',
            ],
            [
                'name' => 'School of Mathematical Sciences',
            ],
            [
                'name' => 'School of Management and Economics',
            ],
            [
                'name' => 'School of Automation Engineering',
            ],
            [
                'name' => 'School of Mechatronics Engineering',
            ],
            [
                'name' => 'School of Optoelectronic Information',
            ],
            [
                'name' => 'School of Computer Science & Engineering',
            ],
            [
                'name' => 'School of Life Science and Technology',
            ],
            [
                'name' => 'School of Foreign Languages',
            ],
            [
                'name' => 'School of Energy Science and Engineering',
            ],
            [
                'name' => 'School of Marxism Education',
            ],
            [
                'name' => 'School of Political Science and Public Administration',
            ],
            [
                'name' => 'School of Microelectronics and Solid-State Electro',
            ],
            [
                'name' => 'School of Electronic Engineering',
            ],
            [
                'name' => 'School of Physical Electronics',
            ],
            [
                'name' => 'School of Communication & Information Engineering',
            ],
            [
                'name' => 'Yingcai Experimental School',
            ],
            [
                'name' => 'UoG-UESTC Joint School',
            ],
            [
                'name' => 'School of Resources and Environment',
            ],
            [
                'name' => 'School of Medicine',
            ],
            [
                'name' => 'Institute of Fundamental and Frontier Sciences',
            ],
            [
                'name' => 'School of Energy Science and Engineering',
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
        Schema::dropIfExists('department');
    }
}
