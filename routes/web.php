<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//start admin
Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admin_dashboard',[AdminController::class,"dashboard"])->name('admin_dashboard');
Route::get('category',[AdminController::class,'category'])->name("category");
Route::get("product",[AdminController::class,"product"])->name("product");
Route::get("user",[AdminController::class,"user"])->name("user");
Route::get("order",[AdminController::class,"order"])->name("order");
Route::get("order_item",[AdminController::class,"order_item"])->name("order_item");
});
//end admin
Route::get("goHome", [HomeController::class,"goHome"])->name("goHome");
Route::get("cart", [HomeController::class,"cart"])->name("cart");
