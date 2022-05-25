<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/{any?}', 'admin.vue.app')->where('any', '.*');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

