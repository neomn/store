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
//
//        $request->session()->regenerate();
//
//        return redirect()->intended(RouteServiceProvider::HOME);



//        return 'authenticated session controller -> store ';


        $request->authenticate();

        $request->session()->regenerate();
//
//        if (Auth::guard('admin')->check() && !Auth::guard('web')->check() ) {
//            //dd('AuthenticatedSessionController >> store if 1 ');
//            return redirect()->route('admin.panel');
//        }
//
         if (Auth::guard('web')->check() && !Auth::guard('admin')->check()) {
            //dd('AuthenticatedSessionController >> store if 2 ');
//            return redirect()->intended(RouteServiceProvider::HOME);
             return response('user authenticated successfully');
        }

//        else {
//            Auth::guard('web')->logout();
//            Auth::guard('admin')->logout();
//            $request->session()->invalidate();
//            $request->session()->regenerateToken();
//            return redirect()->route('login');
//        }


    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
       // dd('destroy');

        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


//        return redirect('/');
        return 'authenticated session controller -> destroy ';
    }
}
