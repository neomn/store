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
        return response()->json(['successfully registered' => User::create($credentials)] , '200');
    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
