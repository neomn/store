<?php

namespace App\Http\Controllers\v1\Auth\ApiAuth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class ApiAuth extends ApiController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['phone_number' , 'password']);
        if ($token = auth()->attempt($credentials))
            return $this->respondWithToken($token);

        return response()->json(['unAuthorized' => 'invalid phone number or password'] , '401');
    }

    public function me(Request $request)
    {
        return response()->json('me');
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
