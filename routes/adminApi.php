<?php

use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/panel/{any?}', 'admin.vue.app')
    ->middleware('adminAuthenticator')
    ->where('any', '.*?')
    ->name('panel');
