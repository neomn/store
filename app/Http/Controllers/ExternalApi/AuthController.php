<?php

namespace App\Http\Controllers\ExternalApi;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        if ($user = User::create($request->toArray()))
            return response()->json(['register' => $user]);
        return response()->json(['register' => 'failed to register new user']);
    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
