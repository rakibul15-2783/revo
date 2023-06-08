<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

use Mail;

class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function register(){
        return view('register');
    }
    public function insert(Request $rqst){

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

        $user = new User;
        $user->name = $rqst->name;
        $user->email = $rqst->email;
        $user->username = $rqst->username;
        $user->phone = $rqst->phone;
        $user->password = Hash::make($rqst->password);
        $user->save();
        // $data = ['name'=>"rakib",'data'=>"hello rakib"];
        // Mail::send('register',$data,function($messege) use ($user){
        //     $messege ->to('rakibul15-2783@diu.edu.bd');
        //     $messege->subject("Successfully Registered");
        // });
        return redirect()->route('registersuccess');

    }
    public function login(){
        return view('login');
    }
    
    public function loginpermission(Request $rqst)
    {
       $rqst->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $rqst->only('email','password');
        

        if(Auth::attempt($credentials)){
            
            return redirect()->intended('mainpage');        
        }

        
        return back();
    
    }

    public function mainpage(){
        
            return view('mainpage');
        }
    
    public function registersuccess(){
        
            return view('registersuccess');
        
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    

    
}
