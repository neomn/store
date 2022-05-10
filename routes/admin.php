<?php

use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

//Route::get('/neo' , function (){
//   return view('admin.blade.customer.preview');
//});

Route::view('/panel/{any?}','admin.vue.app')
   // ->middleware('adminAuthenticator')
    ->where('any','.*?')
    ->name('panel');
