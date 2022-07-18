<?php

namespace App\Http\Controllers\ExternalApi;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $credentials = [
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ];
        if ($user = User::create($credentials))
//            return response()->json(['register' => $user]);
//        return response()->json(['register' => 'failed to register new user']);
        return response()->json(['register' => $credentials]);
    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
