<?php

use App\Http\Controllers\ExternalApi\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){
    Route::post('login', [AuthController::class , 'login'])->withoutMiddleware('auth:api');
});
