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

//user control
Route::middleware('auth')->group(function () {
    Route::get('/mainpage',[UserController::class,'mainpage'])->name('mainpage');
    Route::get('/order',[UserController::class,'order'])->name('order');
    Route::post('/ordersuccess',[UserController::class,'ordersuccess'])->name('ordersuccess');
    Route::get('/seeorder',[UserController::class,'seeorder'])->name('seeorder');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    
});

Route::middleware('guest')->group(function(){
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/insesrtuser',[UserController::class,'insert'])->name('insesrtuser');
    Route::post('/loginpermission',[UserController::class,'loginpermission'])->name('loginpermission');
    Route::get('/adminlogin',[AdminController::class,'adminlogin'])->name('adminlogin');
    Route::post('/adminloginpost',[AdminController::class,'adminloginpost'])->name('adminloginpost');
    
});

//admin controll
Route::middleware('auth','role')->group(function () {
    Route::get('/adminprofile',[AdminController::class,'adminprofile'])->name('adminprofile');  
    Route::get('/adminlogout',[AdminController::class,'adminlogout'])->name('adminlogout');
    Route::get('/orderdetails',[AdminController::class,'orderdetails'])->name('orderdetails');
    Route::get('/userdetails',[AdminController::class,'userdetails'])->name('userdetails');
    //order accept
    Route::get('/orderaccept/{id}',[AdminController::class,'orderaccept']);
    //user role change
    Route::get('/userrolechangetoadmin/{id}',[AdminController::class,'userrolechangetoadmin']);
    //admin role change
    Route::get('/adminrolechangetouser/{id}',[AdminController::class,'adminrolechangetouser']);
    //user/admin delete
    Route::get('/userdelete/{id}',[AdminController::class,'userdelete']);
    
});

Route::get('/goback',[AdminController::class,'goback'])->name('goback');



Route::get('/', function () {
    return view('welcome');
});
