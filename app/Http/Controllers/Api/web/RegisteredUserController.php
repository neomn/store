<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{

    public function __invoke(Request $request)
    {

//        $request->validate([
//            'firstName' => ['required', 'string', 'max:255'],
//            'lastName' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        $user = User::create([
//            'firstName' => 'Neo',
//            'lastName' => 'mn',
//            'email' => 'neomn@123',
//            'password' => '123456789',
//        ]);

        event(new Registered($user));
        $user = User::where('email' , $user->email)->first();
        Auth::login($user);
        return response($user);
    }
}
