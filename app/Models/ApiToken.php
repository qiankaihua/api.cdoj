<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class ApiToken extends Model
{
    protected $table = 'api_token';
    protected $dates = ['created_at','updated_at','expired_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
