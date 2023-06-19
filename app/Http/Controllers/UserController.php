<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use App\Jobs\EmailSendJob;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function register()
    {
        return view('register');
    }

    //user registration
    public function insert(Request $rqst)
    {

        $rqst->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User();
        $user->name = $rqst->name;
        $user->email = $rqst->email;
        $user->username = $rqst->username;
        $user->phone = $rqst->phone;
        $user->password = Hash::make($rqst->password);
        $user->save();

        //registration confirmation email


        $mail = $user->email;
        $sendMail = new EmailSendJob($mail);
        dispatch($sendMail);

        return view('registersuccess');

    }

         //user login
    public function login()
    {
        return view('login');
    }

    public function loginpermission(Request $rqst)
    {
        $rqst->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
        $credentials = $rqst->only('email', 'password');


        if(Auth::attempt($credentials)) {

            return redirect()->intended('mainpage');
        }


        return back();

    }

    public function mainpage()
    {

        return view('mainpage');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    //order
    public function order()
    {
        return view('order');
    }
    public function ordersuccess(Request $rqst)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->date = $rqst->date;
        $order->Item = $rqst->item;
        $order->save();
        return redirect()->route('seeorder');
    }

    public function seeorder()
    {
        $user = Auth::user();
        $orders = $user->orders()->get();
        return view('seeorder', compact('orders'));
    }





}
