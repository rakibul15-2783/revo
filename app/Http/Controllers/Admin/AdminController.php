<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;

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

                                          //order details
    public function orderdetails(Request $request){
        $searchQuery = $request->input('search');
        $searchQueryByOrder = $request->input('searchbyorder');
        $searchQueryByProgress = $request->input('searchbyprogress');
                             //date range picker search
        $dateRange = $request->input('daterange');

        $query = Order::query()->orderByDesc('date');

                     //name/email/ search
        if (!is_null($searchQuery)) {
            $searchQuery = trim($searchQuery);
            $query->whereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchQuery . '%');
                    
            })->orWhere('Item', 'LIKE', '%' . $searchQuery . '%');
        }
                         //order search
        if (!is_null($searchQueryByOrder)) {
            $searchQueryByOrder = trim($searchQueryByOrder);
            $query->where('Item','LIKE', '%'.$searchQueryByOrder.'%');
        }

                     //accept or processing search
        if (!is_null($searchQueryByProgress)) {
            $searchQueryByProgressValue = intval($searchQueryByProgress);
            if ($searchQueryByProgressValue == 2) {
                $query->where('action', 2);
            } elseif ($searchQueryByProgressValue == 1) {
                $query->where('action', 1);
            }
        }
                      //date range picker search
        if (!is_null($dateRange)) {
            // Extract start and end dates from the date range string
            list($startDate, $endDate) = explode(' - ', $dateRange);
    
            // Parse the dates
            $startDate = Carbon::createFromFormat('m/d/Y', $startDate)->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $endDate)->endOfDay();
    
            // Filter the orders within the date range
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        $orders = $query->paginate(8);
        $orders->appends($request->except('page'))->appends([
            'search' => $searchQuery,
            'searchbyorder' => $searchQueryByOrder,
            'searchbyprogress' => $searchQueryByProgress,
            'dateRange' => $dateRange,
        ]);
        return view('admin.orderdetails', compact(
            'orders',
            'searchQuery',
            'searchQueryByOrder',
            'searchQueryByProgress',
            'dateRange'
        ));
    }

                                                //user info
    public function userdetails(Request $request){


        $searchQuery = $request->input('search');
        $searchQueryByRole = $request->input('searchbyrole');

        $query = User::orderBy('id','desc');

        if(!is_null($searchQuery))
        
        {
            $searchQuery = trim($searchQuery);
            $query->where('name','LIKE', '%'.$searchQuery.'%')
                  ->orWhere('phone', 'LIKE', '%' . $searchQuery . '%');
        }
        if (!is_null($searchQueryByRole)) {
            $searchQueryByRole = intval($searchQueryByRole);
            if ($searchQueryByRole == 1) {
                $query->where('role', 1);
            } elseif ($searchQueryByRole == 2) {
                $query->where('role', 2);
            }
        }

        $users =  $query->paginate(4);
        $users->appends($request->except('page'))->appends([
            'search' => $searchQuery,
            'searchbyrole' => $searchQueryByRole
                ]);
        return view('admin.userdetails',compact(
            'users','searchQuery','searchQueryByRole'
        ));
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
        $users = User::all();
        return view('admin.makeorder',compact('users'));
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
        $users = User::all();
        return view('admin.deposit',compact('users'));
    }
    public function depositpost(Request $rqst){
        $user = User::where('username',$rqst->username)->first();
        if(!$user){
            return back()->with('error','User not found!');
        }
        else{
            $deposit = new Deposit;
            $deposit->user_id = $user->id;
            $deposit->month = $rqst->month;
            $deposit->amount = $rqst->amount;
            $deposit->save();
            return redirect()->route('depositview');

        }
    }
    public function depositview(Request $request){
        $searchQuery = $request->search;
        $query = Deposit::query()->orderBy('month');

        if (!is_null($searchQuery)) {
            $searchQuery = trim($searchQuery);
            $query->whereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchQuery . '%');
            });
        }
    
        $deposits = $query->paginate(8);
        return view('admin.depositview',compact('deposits'));
    }
    
   

   
    


    //logout 
    public function adminlogout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('adminlogin');
    }
}
