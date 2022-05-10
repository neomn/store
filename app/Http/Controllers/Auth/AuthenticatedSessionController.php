<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     */
    public function store(LoginRequest $request)
    {
//        $request->authenticate();
//        $request->session()->regenerate();
//        return redirect()->intended(RouteServiceProvider::HOME);

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->authenticate();
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
            $request->authenticate();
            $request->session()->regenerate();
            $userData = [
                'user' => [
                    'firstName' => $request->user()->firstName,
                    'type' => 'admin',
                ]
            ];
            return response($userData);
        }

        return response('invalid credentials');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
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
