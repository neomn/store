<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use http\Env\Response;
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

        if (Auth::guard('admin')->attempt($credentials)) {
//            $request->authenticate();
//            $request->session()->regenerate();
            return response('admin authenticated successfully');
        }

        if (Auth::guard('web')->attempt($credentials)) {
//            $request->authenticate();
            $request->session()->regenerate();
            return response('user authenticated successfully');
        }

        return response('authentication failed');
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
