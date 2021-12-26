<?php

use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;

Route::view('/','admin.mainMasterPage');

Route::resource( 'customer',customerController::class);
