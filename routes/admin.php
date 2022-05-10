<?php

use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/panel/{any?}','admin.vue.app')
//    ->middleware('adminAuthenticator')
    ->where('any','.*?')
    ->name('panel');
