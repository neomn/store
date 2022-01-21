<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('root');
})->name('root');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/test', function () {

    $adminCredential = [
        'email' => 'neomn110@gmail.com',
        'password' => '12345678'
    ];

    $userCredential = [
        'email' => 'user@1',
        'password' => '12345678'
    ];

    Auth::guard('admin')->logout();
    Auth::guard('web')->logout();
    dd(
        Auth::guard('admin')->check(),
        Auth::guard('admin')->attempt($adminCredential),
        Auth::guard('admin')->check(),

        Auth::guard('web')->check(),
        Auth::guard('web')->attempt($userCredential),
        Auth::guard('web')->check());
});
