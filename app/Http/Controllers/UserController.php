<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use  Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Session;

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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->name = $rqst->name;
        $user->email = $rqst->email;
        $user->phone = $rqst->phone;
        $user->password = $rqst->password;
        $user->save();
        return back();

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
            $rqst->session()->put('username', $user->username);
            return redirect()->intended('mainpage');
        }
        
        return redirect(route('login'))->with('error', 'Login Details are not valid!');
    
    }

    public function mainpage(){
        
        if(Session::has('loginId')){
            return view('mainpage');
        }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    

    
}
