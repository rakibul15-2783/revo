
@extends('admin.includes.master')
@section('main-content')  
				<div class="top-bar p-3">
				<h3><strong>Dashboard</strong> User Details</h3>
				</div>						
				@if(Auth::user()->role==0)
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
								<tbody>
									
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
											<span>Super Admin</span>
											@else
											<button href="#" value = "{{$user->id}}" class="btn btn-sm btn-info btn-admin-role">Admin</button>
											@endif	
                                        </td> 
										<td>
										    @if($user->role==0)
											<span>No Action</span>
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
								<!-- admin can't change role -->
								@else
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
											<span>User</span>
											@elseif($user->role == 0)
											<span>Super Admin</span>
											@else
											<span>Admin</span>
											@endif	
                                        </td>	
									</tr>
									@endforeach
								</tbody>
								</table>
								</div> 
								@endif
</div>
								 <!-- jQuery cdn -->
								 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>			</div>
			<!-- jQuery for accept order -->
			<script>
				jQuery(document).ready(function(){

					//user/admin delete
					jQuery(document).on("click",".btn-user-delete",function(){
						var id = jQuery(this).val();
						jQuery.ajax({
							url: "userdelete/" + id,
							type: "get",
							success: function(res){
								alert(res.msg);
							}
						});
					});

					//user role change to admin
					jQuery(document).on("click",".btn-user-role",function(){
						var id = jQuery(this).val();
						jQuery.ajax({
							url: "userrolechangetoadmin/" + id,
							type: "get",
							success: function(res){
								alert(res.msg);
							}
						});
					});

					//admin role change to user
					jQuery(document).on("click",".btn-admin-role",function(){
						var id = jQuery(this).val();
						jQuery.ajax({
							url: "adminrolechangetouser/" + id,
							type: "get",
							success: function(res){
								alert(res.msg);
							}
						});
					});
				});
			</script>	
						
@endsection