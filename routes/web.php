<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Middleware;

// Route::get('/login', function(){
//     return view('login');
// });

// Route::get('/register',function (){
//     return view('register');
// });




Route::get('/login',[AuthController::class,'login'])->name('show.login');
Route::get("/register",[AuthController::class,'register'])->name('show.register');
Route::post('/proccessRegister',[AuthController::class,'proccessRegister'])->name('register');
Route::post("/proccessLogin",[AuthController::class,'proccessLogin'])->name('proccessLogin');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::middleware(Middleware::class)->group(function(){
    Route::get('/product',[DashboardController::class,'product'])->name('show.product');
    Route::get('/index',[DashboardController::class,'index'])->name('index');
});



