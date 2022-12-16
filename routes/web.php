<?php

use App\Http\Controllers\Base\AuthController;
use App\Http\Controllers\Base\IndexController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [IndexController::class, 'showIndexPage']);

Route::get("signin", [AuthController::class, 'showSigninPage']);
Route::get("signup", [AuthController::class, 'showSignupPage']);
Route::post("signup", [AuthController::class, 'makeNewUser']);
