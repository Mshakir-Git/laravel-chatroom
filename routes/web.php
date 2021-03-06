<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;

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

Route::get('/', function () {
    return redirect()->route("chatroom");
})->name("home");

Route::get('/register', [AuthController::class,"registerPage"])->name("register")->middleware("guest");
Route::post('/register', [AuthController::class,"registerFunc"])->middleware("guest");

Route::get('/login', [AuthController::class,"loginPage"])->name("login")->middleware("guest");
Route::post('/login', [AuthController::class,"loginFunc"])->middleware("guest");
Route::post('/logout', [AuthController::class,"logoutFunc"])->name("logout");

Route::get('/chatroom', [MessageController::class,"chatPage"])->middleware("auth")->name("chatroom");
Route::post('/chatroom/add', [MessageController::class,"addMessage"])->middleware("auth");

Route::get('/profile', [AuthController::class,"profilePage"])->name("profile")->middleware("auth");