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

Route::get('/register', [AuthController::class,"registerPage"])->name("register");
Route::post('/register', [AuthController::class,"registerFunc"]);

Route::get('/login', [AuthController::class,"loginPage"])->name("login");
Route::post('/login', [AuthController::class,"loginFunc"]);
Route::post('/logout', [AuthController::class,"logoutFunc"])->name("logout");

Route::get('/chatroom', [MessageController::class,"chatPage"])->middleware("auth")->name("chatroom");
Route::post('/chatroom/add', [MessageController::class,"addMessage"])->middleware("auth");