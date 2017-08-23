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
        $this->validate($request, [
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

    }

    //
}
