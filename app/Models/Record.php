<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';

    public function testcases() {
        return $this.hasMany('App\Models\Testcase', 'record_id', 'id');
    }

    public function user() {
        return $this.belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function problem() {
        return $this.belongsTo('App\Models\Problem', 'problem_id', 'id');
    }
    public function contest() {
        return $this.belongsTo('App\Models\Contest', 'contest_id', 'id');
    }
    public function compile_info() {
        return $this.belongsTo('App\Models\CompileInfo', 'compile_info_id', 'id');
    }
    public function language() {
        return $this.belongsTo('App\Models\Language', 'language_id', 'id');
    }
    public function code() {
        return $this.belongsTo('App\Models\Code', 'code_id', 'id');
    }
    public function judge_result() {
        return $this.belongsTo('App\Models\JudgeResult', 'judge_result_id', 'id');
    }
}
