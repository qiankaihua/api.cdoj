<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    public function records() {
        return $this.hasMany('App\Models\Record', 'language_id', 'id');
    }
}
