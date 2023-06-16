<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Deposit;

class OrderInfoControler extends Controller
{
    public function index(Request $request){
        $searchQueryByProgress = $request->input('searchbyprogress');
        $searchQuery = $request->input('search');
        $dateRange = $request->input('daterange');
        $query = Order::query()->orderByDesc('date');

        //accept or processing search

        if (!is_null($searchQueryByProgress)) {
            $searchQueryByProgressValue = intval($searchQueryByProgress);
            if ($searchQueryByProgressValue == 2) {
                $query->where('action', 2);
            } elseif ($searchQueryByProgressValue == 1) {
                $query->where('action', 1);
            }
        }

        //name/email/order search

        if (!is_null($searchQuery)) {
            $searchQuery = trim($searchQuery);
            $query->where(function ($query) use ($searchQuery) {
                $query->whereHas('user', function ($query) use ($searchQuery) {
                    $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                        ->orWhere('email', 'LIKE', '%' . $searchQuery . '%');

                })->orWhere('Item', 'LIKE', '%' . $searchQuery . '%');

            });
        }
        $orders = $query->paginate(8);
            $orders->appends($request->except('page'))->appends([
                'search' => $searchQuery,
                'searchbyprogress' => $searchQueryByProgress,
                'dateRange' => $dateRange,
            ]);

        return view('admin.orderdetails', compact(
            'orders',
            'searchQuery',
            'searchQueryByProgress',
            'dateRange'
        ));
            }

        public function show(){
            $orders = Order::all();
            return response()->json([
                "data" => $orders
            ]);
        }
}
