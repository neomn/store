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
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $user = User::where('email' , $user->email)->first();
        Auth::login($user);

        $userData = [
            'user' => [
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'email' => $user->email,
            ]
        ];
        return response($userData);
    }
}
