<?php

use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;

Route::view('/panel','admin.mainMasterPage')
    ->middleware('adminAuthenticator')->name('panel');

//Route::resource( 'customer',customerController::class);
