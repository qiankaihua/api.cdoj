<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testcase extends Model
{
    protected $table = 'testcase';

    public function record() {
        return $this.belongsTo('App\Models\Record', 'record_id', 'id');
    }
    public function testdata() {
        return $this.belongsTo('App\Models\Testdata', 'testdata_id','id');
    }
    public function judge_result() {
        return $this.belongsTo('App\Models\JudgeResult', 'judge_result_id', 'id');
    }
    public function diff_info() {
        return $this.belongsTo('App\Models\DiffInfo', 'diff_info_id', 'id');
    }
}
