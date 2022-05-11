<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/panel/{any?}', 'admin.vue.app')
    ->where('any', '.*?')
    ->name('panel');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

