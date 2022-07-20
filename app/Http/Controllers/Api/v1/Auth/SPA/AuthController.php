<?php

namespace App\Http\Controllers\Api\v1\Auth\SPA;

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
        return response()->json(['response' => $credentials]);
    }

    public function me(Request $request)
    {
        return response()->json('me');
    }
}
