@extends('admin.includes.master')
@section('main-content')
    <div class="top-bar p-3">
        <h4><strong>User Details</strong> </h4>
    </div>

    <!-- Search form -->
    <div class="row">
    <div class="col-md-9 my-auto">
    <form role="search" method="GET" action="{{ route('userdetails2') }}">
        <div class="input-group">
            <input type="search" name="search" id="searchQuery" value="{{ $searchQuery }}" placeholder="Search here" class="form-control">
            <select name="searchbyrole" class="form-control">
                <option value="">Search by Role</option>
                <option value="1" @if ($searchQueryByRole == '1') selected @endif>User</option>
                <option value="2" @if ($searchQueryByRole == '2') selected @endif>Admin</option>
            </select>
            <button class="btn bg-info " type="submit">
                Search
            </button>
            @if ($searchQuery || $searchQueryByRole)
                <a class="text-danger btn" href="{{ route('userdetails2') }}"><i class="fa-solid fa-xmark fa-lg"></i></a>
            @endif
        </div>
    </form>
</div>


@if(Auth::user()->role==0)
				<div class="card-body">
                            <div class="border p-4 rounded">
				<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
							<div class="card">

								<table class="table table-striped">

							<!-- Super admin can change role -->


									<thead>
										<tr>
											<th style="width:25%;">Name</th>
											<th style="width:10%;">Username</th>
											<th style="width:20%;">Email</th>
											<th style="width:20%;">Phone</th>
											<th style="width:10%;">Role</th>
											<th style="width:30%;">Action</th>
										</tr>
									</thead>
								<tbody class="userdetails">

									@foreach($users as $user)
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->phone }}</td>
										<td>
											@if($user->role == 1)
											<button href="#" value = "{{$user->id}}" class="btn btn-sm btn-info btn-user-role">User</button>
											@elseif($user->role == 0)
											<span class="badge badge-success">Super Admin</span>
											@else
											<button href="#" value = "{{$user->id}}" class="btn btn-sm btn-info btn-admin-role">Admin</button>
											@endif
                                        </td>
										<td>
										    @if($user->role==0)
											<span class="badge badge-success" >No Action</span>
											@else
											<button  value = "{{$user->id}}" class="btn btn-sm btn-info">Edit</button>
											<button  value = "{{$user->id}}" class="btn btn-sm btn-danger btn-user-delete">Delete</button>
											@endif


										</td>
									</tr>
									@endforeach
								</tbody>
                                </div>
								</table>


								</div>
								</div>
								{{ $users->links() }}
								</div>
                                @else
        <!-- Admin can't change role -->
        <div class="card-body">
            <div class="border p-4 rounded">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <div class="card">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if($user->role == 1)
                                                    <span class="badge badge-warning">User</span>
                                                @elseif($user->role == 0)
                                                    <span class="badge badge-danger">Super Admin</span>
                                                @else
                                                    <span class="badge badge-success">Admin</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    @endif

@endsection

@section('js')
    <!-- jQuery for user actions -->
    <script>
        jQuery(document).ready(function(){

            // //test for live search

            // jQuery('#searchQuery').on('keyup', function(){

            //     alert(jQuery(this).val());
            // });


            // User/Admin delete
            jQuery(document).on("click",".btn-user-delete",function(){
                var id = jQuery(this).val();
                jQuery.ajax({
                    url: "userdelete/" + id,
                    type: "get",
                    success: function(res){
                        alert(res.msg);
                        show();
                    }
                });
            });

            // User role change to Admin
            jQuery(document).on("click",".btn-user-role",function(){
                var id = jQuery(this).val();
                jQuery.ajax({
                    url: "userrolechangetoadmin/" + id,
                    type: "get",
                    success: function(res){
                        alert(res.msg);
                        show();
                    }
                });
            });

            // Admin role change to User
            jQuery(document).on("click",".btn-admin-role",function(){
                var id = jQuery(this).val();
                jQuery.ajax({
                    url: "adminrolechangetouser/" + id,
                    type: "get",
                    success: function(res){
                        alert(res.msg);
                        show();
                    }
                });
            });


            function show() {
                jQuery.ajax({
                    url: "/userdetails2/show",
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        var alldata = "";
                        var role = "";

                        jQuery.each(res.data, function(key, val) {
                            if (val.role == "1") {
                                role = '<button href="#" value="' + val.id + '" class="btn btn-sm btn-info btn-user-role">User</button>';
                            }
                            else {
                                role = '<button href="#" value="' + val.id + '" class="btn btn-sm btn-success btn-admin-role">Admin</button>';
                            }
                            alldata += '<tr>\
                                <td>' + val.name + '</td>\
                                <td>' + val.username + '</td>\
                                <td>' + val.email + '</td>\
                                <td>' + val.phone + '</td>\
                                <td>' + role + '</td>\
                                <td> \
                                    <button value="' + val.id + '" class="btn btn-info btn-sm edit-btn">Edit</button> \
                                    <button value="' + val.id + '" class="btn btn-danger btn-sm delete">Delete</button> \
                                </td>\
                            </tr>';
                        });
                        jQuery(".userdetails").html(alldata);
                    }
                })
            }
        })
    </script>
@endsection
