<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function orderdetails(){
        return view('admin.orderdetails');
    }
    public function userdetails(){
        return view('admin.userdetails');
    }
    public function goback(){
        return view('notaccess');
    }
}
