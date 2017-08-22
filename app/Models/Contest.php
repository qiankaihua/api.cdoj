<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contest';

    public function problems()
    {
        return $this->belongsToMany('App\Models\Problem', 'contest_x_problem', 'contest_id', 'problem_id')
            ->withPivot(['order'])
            ->withTimestamps()
            ->orderBy('order');
    }
}
