<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testdata extends Model
{
    protected $table = 'testdata';
/*
    public function getInputContentAttribute() {
        $path = storage_path('app/testdata/' . $this->hashcode . '/' . $this->input_filename);
        if (file_exists($path)) {
            return file_get_contents($path);
        } else {
            return 'input file not exists!';
        }
    }

    public function getOutputContentAttribute() {
        $path = storage_path('app/testdata/' . $this->hashcode . '/' . $this->output_filename);
        if (file_exists($path)) {
            return file_get_contents($path);
        } else {
            return 'output file not exists!';
        }
    }
*/
    public function testcases() {
        return $this.hasMany('App\Models\Testcase', 'testcase_id', 'id');
    }

    public function problem() {
        return $this.belongsTo('App\Models\Problem', 'problem_id', 'id');
    }
}
