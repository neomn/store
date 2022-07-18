<?php

namespace App\Http\Controllers\ExternalApi;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {

    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
