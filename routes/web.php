<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\Admin\AdminController;

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

Route::middleware('role')->group(function () {
    Route::get('/orderdetails',[AdminController::class,'orderdetails'])->name('orderdetails');
    Route::get('/userdetails',[AdminController::class,'userdetails'])->name('userdetails');
}); 
Route::middleware('auth')->group(function () {
    Route::get('/mainpage',[UserController::class,'mainpage'])->name('mainpage');
    Route::get('/order',[UserController::class,'order'])->name('order');
    Route::post('/ordersuccess',[UserController::class,'ordersuccess'])->name('ordersuccess');
    Route::get('/seeorder',[UserController::class,'seeorder'])->name('seeorder');
    
    
});

Route::middleware('guest')->group(function(){
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/insesrtuser',[UserController::class,'insert'])->name('insesrtuser');
    Route::post('/loginpermission',[UserController::class,'loginpermission'])->name('loginpermission');
});




Route::get('/logout',[UserController::class,'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});
