<?php

namespace App\Http\Controllers\v1\Auth\SpaAuth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class SpaAuth extends ApiController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['phone_number' , 'password']);
        return response()->json(['response' => $credentials]);
    }

    public function me(Request $request)
    {
        return response()->json('me');
    }
}
