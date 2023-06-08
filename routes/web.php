<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;

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

Route::middleware('auth')->group(function () {
    Route::get('/mainpage',[UserController::class,'mainpage'])->name('mainpage');
});
Route::middleware('guest')->group(function(){
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/insesrtuser',[UserController::class,'insert'])->name('insesrtuser');
    Route::get('/registersuccess',[UserController::class,'registersuccess'])->name('registersuccess');
    Route::post('/loginpermission',[UserController::class,'loginpermission'])->name('loginpermission');
});




Route::get('/logout',[UserController::class,'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});
