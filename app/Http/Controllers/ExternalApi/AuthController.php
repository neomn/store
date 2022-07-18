<?php

namespace App\Http\Controllers\ExternalApi;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {

    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
