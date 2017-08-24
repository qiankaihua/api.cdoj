<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JudgeResult extends Model
{
    protected $table = 'judge_result';

    public function records() {
        return $this->hasMany('App\Models\Record', 'judge_result_id', 'id');
    }
    public function testcases() {
        return $this->hasMany('App\Models\Testcase', 'judge_result_id', 'id');
    }
}
