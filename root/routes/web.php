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
    Route::get("/",[ManagementController::class,'selectURL'])->name("home");
    // ログアウト機能
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');
    //社員一覧画面の表示
    Route::get("/users",[ManagementController::class,'showUsersList'])->name('showUsersList');
    // 社員登録画面の表示
    Route::get("/user/register",[ManagementController::class,'showRegisterUser'])->name('showRegisterUser');
    // 社員の登録
    Route::post("/user/register/edit",[ManagementController::class,'userRegister'])->name('userRegister');
    //社員詳細情報画面の表示
    Route::get('/user/{id}',[ManagementController::class,'showUserDetail'])->name('showUserDetail');
    //社員編集画面を表示
    Route::get('/user/edit/{id}',[ManagementController::class,'showUserEdit'])->name('showUserEdit');
    // 社員編集
    Route::post("/user/update",[ManagementController::class,'userUpdate'])->name('userUpdate');
    // 休日申請画面の表示
    Route::get("/holiday/request",[ManagementController::class,'showHolidayRequest'])->name('showHolidayRequest');
    // 申請一覧の表示
    Route::get("/application",[ManagementController::class,'showApplicationList'])->name('showApplicationList');


    //勤怠一覧画面の表示
    Route::get("/works",[ManagementController::class,'showWorksList'])->name('showWorksList');
    // //勤怠一覧画面の指定した月を表示
    Route::get("/works/index",[ManagementController::class,'showWorksIndex'])->name('showWorksIndex');
    // 勤怠登録画面の表示
    Route::get("/works/register",[ManagementController::class,'showRegisterWork'])->name('showRegisterWork');
    //勤怠登録
    Route::post("/works/register/edit",[ManagementController::class,'registerWork'])->name('registerWork');
});