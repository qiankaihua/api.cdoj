<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problem';

    public function getSamplesAttribute()
    {
        if ($this->attributes['samples']) {
            return json_decode($this->attributes['samples']);
        } else {
            return [];
        }
    }
    public function setSamplesAttribute($samples)
    {
        if ($samples) {
            $this->attributes['samples'] = json_encode($samples);
        } else {
            $this->attributes['samples'] = '[]';
        }
    }
    public function getHintAttribute()
    {
        if ($this->attributes['hint']) {
            return json_decode($this->attributes['hint']);
        } else {
            return [];
        }
    }
    public function setHintAttribute($hint)
    {
        if ($tips) {
            $this->attributes['hint'] = json_encode($hint);
        } else {
            $this->attributes['hint'] = '[]';
        }
    }

    public function records() {
        return $this.hasMany('App\Models\Record', 'problem_id', 'id');
    }
    public function testdatas() {
        return $this.hasMany('App\Models\Testdata', 'problem_id', 'id');
    }
    public function contests() {
        return $this.belongsToMany('App\Models\Contest', 'contest_x_problem', 'problem_id', 'contest_id')
            ->withPivot(['order'])
            ->withTimestamps();;
    }
}
