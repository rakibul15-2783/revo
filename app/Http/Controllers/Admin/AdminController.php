<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function orderdetails(){
        $users = User::with("orders")->get();
        return view('admin.orderdetails',compact('users'));
    }
    public function userdetails(){

        $users = User::all();

        return view('admin.userdetails',compact('users'));
    }
    public function goback(){
        return view('goback');
    }
    public function adminprofile(){
        return view('admin.adminprofile');
    }
    public function adminlogin(){
        return view('admin.adminlogin');
    }
    public function adminloginpost(Request $rqst)
    {
       $rqst->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $rqst->only('email','password');
        

        if(Auth::attempt($credentials)){
            
            return redirect()->route('adminprofile');        
        }

        
        return back();
    
    }
    public function adminlogout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('adminlogin');
    }
}
