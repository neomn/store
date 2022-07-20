<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
//        $request->authenticate();
//        $request->session()->regenerate();
//        return redirect()->intended(RouteServiceProvider::HOME);

        $credentials = $request->safe()->only(['phone_number', 'password']);
        return response()->json($credentials);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            $userData = [
                'user' => [
                    'firstName' => $request->user()->firstName,
                    'type' => 'user',
                ]
            ];
            return response($userData);
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $userData = [
                'user' => [
                    'firstName' => Auth::guard('admin')->user()->firstName,
                    'type' => 'admin',
                ]
            ];
            return response($userData);
        }

        return response('invalid credentials');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response('authenticated session controller -> destroy ');
    }
}
