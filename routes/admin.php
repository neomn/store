<?php

use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;

Route::view('/panel/{any?}','admin.panel')
    ->middleware('adminAuthenticator')
    ->where('any','.*?')
    ->name('panel');

//Route::resource( 'customer',customerController::class);
