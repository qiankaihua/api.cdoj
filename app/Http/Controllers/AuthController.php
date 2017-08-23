<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function test() {
        $user = User::where('id',3)->first();
        
        $response = [
            'id' => $user->id,
            'created_at' => $user->created_at->timestamp,
            'updated_at' => $user->updated_at->timestamp,
            'role_id' => $user->role_id,
            'role' => [
                'id' => $user->role->id,
                'name' => $user->role->name,
                ],
            'email' => $user->email,
            'school' => $user->school,
            'department_id' => $user->department_id,
            'department' => [
                'id' => $user->department->department_id,
                'name' => $user->department->name,
            ],
            'nickname' => $user->nickname,
            'realname' => $user->realname,
            'motto' => $user->motto,
            'grade_id' => $user->grade_id,
            'grade' => [
                'id' => $user->grade->id,
                'name' => $user->grade->name,
            ],
            'gender' => $user->gender ? true : false,
        ];
        return response($response);
    }

    public function get(Request $request) {
        $user = \Auth::user();
        $response = [
            'id' => $user->id,
            'created_at' => $user->created_at->timestamp,
            'updated_at' => $user->updated_at->timestamp,
            'role_id' => $user->role_id,
            'role' => [
                'id' => $user->role->id,
                'name' => $user->role->name,
                ],
            'email' => $user->email,
            'school' => $user->school,
            'department_id' => $user->department_id,
            'department' => [
                'id' => $user->department->department_id,
                'name' => $user->department->name,
            ],
            'nickname' => $user->nickname,
            'realname' => $user->realname,
            'motto' => $user->motto,
            'grade_id' => $user->grade_id,
            'grade' => [
                'id' => $user->grade->id,
                'name' => $user->grade->name,
            ],
            'gender' => $user->gender ? true : false,
        ];
        return response($response);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required|string|regex:/^[A-Za-z][A-Za-z0-9_]{4,19}$/',
            'password' => 'required|string|regex:/^[A-Za-z0-9]{40}$/',
        ]);
        $user = User::where('username', $request->input('username'))->first();
        if (!$user) {
            abort(403);
        } elseif (!app('hash')->check($request->input('password'), $user->password)) {
            abort(403);
        } else {
            $apiToken = new ApiToken();
            $apiToken->token = Uuid::uuid4()->toString();
            $apiToken->ip = $request->server('HTTP_X_FORWARDED_FOR', $request->server('REMOTE_ADDR', null));
            if ($request->input('remember', false)) {
                $apiToken->expired_at = null;
            } else {
                $apiToken->expired_at = Carbon::now()->addMinutes(30);
            }
            $user->tokens()->save($apiToken);
            return response([
                'token' => $apiToken->token,
            ]);
        }
    }

    public function register(Request $request) {
        $this->validate($request, [
            'username' => 'required|string|regex:/^[A-Za-z][A-Za-z0-9_]{4,19}$/',
            'password' => 'required|string|regex:/^[A-Za-z0-9]{40}$/',
            'email'    => 'required|string|email|unique:user,email',
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->save();
    }
}
