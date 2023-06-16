<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserInfoController extends Controller
{
    //user details2

    public function index(Request $request)
{
    $searchQuery = $request->input('search');
    $searchQueryByRole = $request->input('searchbyrole');

    $users = User::where('role', '!=', 0);

    if ($searchQuery) {
        $users = $users->where(function ($query) use ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('email', 'LIKE', '%' . $searchQuery . '%');
        });
    }

    if ($searchQueryByRole) {
        $users = $users->where('role', 'LIKE', '%' . $searchQueryByRole . '%');
    }

    $users =  $users->paginate(4);
    $users->appends($request->except('page'))->appends([
        'search' => $searchQuery,
        'searchbyrole' => $searchQueryByRole
            ]);
    return view('admin.userdetails2', compact('searchQuery', 'searchQueryByRole', 'users'));
}

    public function show(){
        $users = User::where('role','!=',0)->get();
        return response()->json([
            "data" => $users
        ]);
    }

    //live search for userdetails

    public function livesearch(){
        $users = User::all();
        return view('admin.livesearchuserdetails',compact('users'));
    }


    public function livesearchpost(Request $request){
        $data ="";
        $users = User::where('name', 'LIKE', '%' . $request->search . '%')
                       ->orWhere('email', 'LIKE', '%' . $request->search . '%')->get();

                       foreach($users as $user){
                        $data.=
                        '<tr>
                        <td> '. $user->name .' </td>
                        <td> '. $user->username .' </td>
                        <td> '. $user->email .' </td>
                        <td> '. $user->phone .' </td>
                        <td>'; 
                        if ($user->role == 1) {
                            $data .= '<button href="#" value="' . $user->id . '" class="btn btn-sm btn-info btn-user-role">User</button>';
                        } elseif ($user->role == 0) {
                            $data .= '<span class="badge badge-success">Super Admin</span>';
                        } else {
                            $data .= '<button href="#" value="' . $user->id . '" class="btn btn-sm btn-info btn-admin-role">Admin</button>';
                        }
                        
                        $data .= '</td>
                            <td>';
                        
                        if ($user->role == 0) {
                            $data .= '<span class="badge badge-success">No Action</span>';
                        } else {
                            $data .= '<button value="' . $user->id . '" class="btn btn-sm btn-info">Edit</button>
                                <button value="' . $user->id . '" class="btn btn-sm btn-danger btn-user-delete">Delete</button>';
                        }
                        
                        $data .= '</td>
                        
                        </tr>';
                       }
                       return response($data);

    }

}