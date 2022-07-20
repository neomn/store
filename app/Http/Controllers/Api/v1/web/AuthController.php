<?php

namespace App\Http\Controllers\Api\v1\web;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function register(RegisterUserRequest $request)
    {
        $credentials = [
            'phone_number' => $request->safe()->phone_number,
            'password' => Hash::make($request->safe()->password),
        ];
        return response()->json(['successfully registered' => User::create($credentials)] , '200');
    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
