<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
Route::view("/manager","manager");
Route::view("/users","users.users");
Route::view("/try","try");
// ログイン機能
Route::get("/login", [AuthController::class,"showLogin"]) ->name("showLogin");
Route::post("login",[AuthController::class,"login"]) ->name("login");
//　ホーム画面
Route::get("/",function(){
    return view("top.manager_top");
})->name("home");
