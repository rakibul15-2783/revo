<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Session;
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
        $user->password = $rqst->password;
        $user->save();
        $data = ['name'=>"rakib",'data'=>"hello rakib"];
        Mail::send('register',$data,function($messege) use ($user){
            $messege ->to('rakibul15-2783@diu.edu.bd');
            $messege->subject("Successfully Registered");
        });
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
        $user = User::where('email',$rqst->email)->first();
        if($rqst->password == $user->password){
            $rqst->session()->put('loginId', $user->id);
           // $rqst->session()->put('username', $user->username);
            return redirect()->intended('mainpage');
        }
        
        return redirect(route('login'))->with('error', 'Login Details are not valid!');
    
    }

    public function mainpage(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id',Session::get('loginId'))->first();
            return view('mainpage',compact('data'));
        }
    }
    public function registersuccess(){
        
            return view('registersuccess');
        
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    

    
}
