<?php

namespace App\Http\Controllers\Api\v1\Auth\SPA;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
