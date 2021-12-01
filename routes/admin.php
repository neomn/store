<?php

use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;

//Route::view( 'customer' ,'admin.customer.preview')->name('preview');

Route::resource( 'customer',customerController::class);
