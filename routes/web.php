<?php

use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class )->name('welcome');

Route::get('categories' , function (){
    $categories = Category::all();
    return view('web.blade.categories' , compact('categories'));
} )->name('categories');

Route::get('product/{product_number}' , function ($product_number){
    $product = Product::where('product_number' , $product_number)->first();
    dd($product);
//    return view('' , compact('product'));
})->name('display-product');

Route::view('shopping-card' , 'web.blade.shoppingCard' )->name('shopping-card');
Route::view('about-us' , 'web.blade.aboutUs' )->name('about-us');
Route::view('contact-us' , 'web.blade.contactUs' )->name('contact-us');

Route::get('/dashboard', function () {
    return view('web.blade.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
