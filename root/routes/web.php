<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ManagementController;

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
Route::view("/try","try");

//ログイン前
Route::middleware(['guest'])->group(function () {
    //ログイン機能
    Route::get("/login", [AuthController::class,"showLogin"]) ->name("showLogin");
    Route::post("login",[AuthController::class,"login"]) ->name("login");
});


// ログイン後のルート
Route::middleware(['auth'])->group(function () {
    //　ホーム画面
    Route::view("/","top.manager_top")->name("home");
    // ログアウト機能
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');
    //社員管理画面
    Route::get("/users",[ManagementController::class,'showUsersList'])->name('users');
});