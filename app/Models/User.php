<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = 'user';

    protected $hidden = [
        'password',
    ];


    public function setPasswordAttribute($pwd) {
        $this->attributes['password'] = app('hash')->make($pwd);
    }
    public function getIsAdminAttribute() {
        return $this->id === 1;
    }


    public function records() {
        return $this->hasMany('App\Models\Record', 'user_id', 'id');
    }
    public function tokens() {
        return $this->hasMany('App\Models\ApiToken', 'user_id', 'id');
    }

    public function role() {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }
    public function department() {
        return $this->belongsTo('App\Models\Department', 'department_id', 'id');
    }
    public function grade() {
        return $this->belongsTo('App\Models\Grade', 'grade_id', 'id');
    }
}
