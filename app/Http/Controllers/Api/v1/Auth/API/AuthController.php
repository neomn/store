<?php

namespace App\Http\Controllers\Api\v1\Auth\API;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['phone_number' , 'password']);
        if ($token = auth()->attempt($credentials))
            return $this->respondWithToken($token);

        return response()->json(['unAuthorized' => 'invalid phone number or password'] , '401');
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
