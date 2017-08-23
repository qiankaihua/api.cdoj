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
        $user = Auth::user();

        if(!$user) {
            abort(401);
        }

        return getJSON($user, [
            'id', 'created_at' => 'created_at.timestamp', 'updated_at' => 'updated_at.timestamp',
            'username', 'email', 'realname', 'gender', 'school',

        ]);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => array('regex:[a-zA-Z][a-zA-Z0-9_]{4,19}'),
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = User::where('username', $request->input('username'))->first();
        if (!$user) {
            abort(403);
        } elseif (!app('hash')->check($request->input('password'), $user->password)) {
            abort(403);
        } else {
            $apiToken = new ApiToken();
            $apiToken->token = Uuid::uuid4()->toString();
            $apiToken->ip = $request->server('REMOTE_ADDR', null);
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
            'username' => 'required|string|unique:user,username',
            'password' => 'required|string',
            'email'    => 'required|string|unique:user,email',
        ]);
        $user = new User();
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->school = $request->input('school');
        $user->department_id = $request->input('department_id');
    }

    //
}
