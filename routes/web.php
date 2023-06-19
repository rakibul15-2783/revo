<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserInfoController;
use App\Http\Controllers\Admin\OrderInfoControler;

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

    //google signup
    Route::get('/google',[UserController::class,'google'])->name('google');
    Route::get('/google/signup',[UserController::class,'googlesignup']);
    //Facebook signup
    Route::get('/facebook',[UserController::class,'facebook'])->name('facebook');
    Route::get('/facebook/signup',[UserController::class,'facebooksignup']);
     
});

//admin controll
Route::middleware('auth','role')->group(function () {
    Route::get('/adminprofile',[AdminController::class,'adminprofile'])->name('adminprofile');  
    Route::get('/adminlogout',[AdminController::class,'adminlogout'])->name('adminlogout');
    //order details 
    Route::get('/orderdetails',[OrderInfoControler::class,'index'])->name('orderdetails');
    Route::get('/orderdetails/show',[OrderInfoControler::class,'show'])->name('orderdetails.show');
    //

     //live search userdetails
     Route::get('/livesearch/userdetails',[UserInfoController::class,'livesearch'])->name('livesearch');
     Route::get('/livesearchpost',[UserInfoController::class,'livesearchpost'])->name('livesearchpost');


    Route::get('/userdetails',[AdminController::class,'userdetails'])->name('userdetails');
    //user details 2
    Route::get('/userdetails2', [UserInfoController::class, 'index'])->name('userdetails2');
    Route::get('/userdetails2/show', [UserInfoController::class, 'show'])->name('userdetails2.show');
    //order accept
    Route::get('/orderaccept/{id}',[AdminController::class,'orderaccept']);
    //user role change
    Route::get('/userrolechangetoadmin/{id}',[AdminController::class,'userrolechangetoadmin']);
    //admin role change
    Route::get('/adminrolechangetouser/{id}',[AdminController::class,'adminrolechangetouser']);
    //user/admin delete
    Route::get('/userdelete/{id}',[AdminController::class,'userdelete']);
    //make a order
    Route::get('/makeorder',[AdminController::class,'makeorder'])->name('makeorder');
    Route::post('/makeordersuccess',[AdminController::class,'makeordersuccess'])->name('makeordersuccess');
    //deposit
    Route::get('/deposit',[AdminController::class,'deposit'])->name('deposit');
    Route::post('/depositpost',[AdminController::class,'depositpost'])->name('depositpost');
    //view amount
    Route::get('/depositview',[AdminController::class,'depositview'])->name('depositview');
    //Search deposit
    Route::get('/searchdeposit',[AdminController::class,'searchdeposit'])->name('searchdeposit');
    //Search user by name
    Route::get('/searchuser',[AdminController::class,'searchuser'])->name('searchuser');
    //Search user by email
    Route::get('/searchuserbyemail',[AdminController::class,'searchuserbyemail'])->name('searchuserbyemail');
    
    
});

Route::get('/goback',[AdminController::class,'goback'])->name('goback');



Route::get('/', function () {
    
    return view('welcome');
});
