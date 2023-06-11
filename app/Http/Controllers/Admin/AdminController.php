<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //admin login
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

    //user order details
    public function orderdetails(){
        $orders = Order::all();
        return view('admin.orderdetails',compact('orders'));
    }

    //user info
    public function userdetails(){

        $users = User::all();

        return view('admin.userdetails',compact('users'));
    }

    //if someones role is user

    public function goback(){
        return view('goback');
    }

    //admin main profile/dashboard

    public function adminprofile(){
        return view('admin.adminprofile');
    }

    //order accept
    public function orderaccept($id){
        $order = Order::find($id);
        $order->action = 2;
        $order->save();
        return response()->json([
            "msg" => "Order Accepted"
        ]);
    }

    //user role change to admin
    public function userrolechangetoadmin($id){
        $user = User::find($id);
        $user->role = 2;
        $user->save();
        return response()->json([
            "msg" => "Made a user to Admin"
        ]);
    }
    //admin role change to user
    public function adminrolechangetouser($id){
        $user = User::find($id);
        $user->role = 1;
        $user->save();
        return response()->json([
            "msg" => "Made a Admin to user"
        ]);
    }
    //user delete
    public function userdelete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "msg" => "User/Admin Deleted"
        ]);
    }
           //make a order
    public function makeorder(){
        return view('admin.makeorder');
    }
    public function makeordersuccess(Request $rqst){
        $user = User::where('username',$rqst->username)->first();
        if(!$user){
            return back()->with('error','User Not Found');
        }
        else{
            $order = new Order;
            $order->user_id = $user->id;
            $order->date = $rqst->date;
            $order->Item = $rqst->item;
            $order->save();
            return redirect()->route('orderdetails');
        }
        
    }
    //deposit

    public function deposit(){
        return view('admin.deposit');
    }
    public function depositpost(Request $rqst){
        $user = User::where('username',$rqst->username)->first();
        if(!$user){
            return back()->with('error','User not found!');
        }
        else{
            $deposit = new Deposit;
            $deposit->user_id = $user->id;
            $deposit->amount = $rqst->amount;
            $deposit->save();
            return redirect()->route('depositview');

        }
    }
    public function depositview(){
        $deposits = Deposit::all();
        return view('admin.depositview',compact('deposits'));
    }
    
    


    //logout 
    public function adminlogout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('adminlogin');
    }
}
