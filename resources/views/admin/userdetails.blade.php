
@extends('admin.includes.master')
@section('main-content')  
				<div class="top-bar p-3">
				<h3><strong>Dashboard</strong> User Details</h3>
				</div>						
	
				<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
							<div class="card">

							<!-- Super admin can change role -->
							@if(Auth::user()->role==0)
								<table class="table table-striped">
								
									<thead>
										<tr>
											<th>Name</th>
											<th>Username</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Role</th>
											<th>Action</th>
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
										<td>
										    
												<button href="#" class="btn btn-sm btn-info">Edit</button>
												<button href="#" class="btn btn-sm btn-danger">Delete</button>
										</td>	
									</tr>
									@endforeach
								</tbody>
                                
								</table>

								<!-- admin can't change role -->
								@else
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
								@endif
							</div>
</div>
							<!-- jQuery cdn -->
							<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>			</div>
			<!-- jQuery for accept order -->
			<script>
				jQuery(document).ready(function(){
					jQuery(document).on("click",".btn-user-role",function(){
						var id = jQuery(this).val();
						jQuery.ajax({
							url: "userrolechange/" + id,
							type: "get",
							success: function(res){
								alert(res.msg);
							}
						})
					})
				})
			</script>	
						
@endsection