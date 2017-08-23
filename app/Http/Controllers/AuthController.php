<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ApiToken;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get(Request $request) {

    }

    public function login(Request $request) {

    }

    public function register(Request $request) {
        $this->validate($request, [
            'username' => [
                'required',
                'between:[4,9]',
                'regex:/^[A-Za-z0-9]+$/'
            ],
            'password' => 'required|string',
            'email'    => 'required|string|email|unique:user,email',
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->school = $request->input('school');
        $user->department_id = $request->input('department_id');
        $user->nickname = $request->input('nickname');
        $user->realname = $request->input('realname');
        $user->motto = $request->input('motto');
        $user->grade_id = $request->input('grade_id');
        $user->gender = $request->input('gender');
        $user->save();
    }
}
