
@extends('admin.includes.master')
@section('main-content')  
				<div class="top-bar p-3">
				<h4><strong>Dashboard</strong> User Details</h>
				</div>		
				<!-- for searching -->
				<div class="row">
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="search" placeholder="Search by the name/email" class="form-control">
							<button class="btn bg-info " type="submit">
							Search
							</button>

							</div>
						</form>
					</div>
					
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
								<!-- admin can't change role -->
								@else
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
								@endif
</div>
</div>
{{ $users->links() }}
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
			<script>
								function searchFunction(){
									let filter = document.getElementById('myInput').value.toUpperCase();
									let myTable = document.getElementById('myTable');
									let tr = myTable.getElementsByTagName('tr');
									for(var i= 0; i<tr.length; i++){
										let td = tr[i].getElementsByTagName('td')[0];
										if(td){
											let textValue = td.textContext || td.innerHTML;
											if(textValue.toUpperCase().indexOf(filter) > -1){
												tr[1].style.display = "";
											}
											else{
												tr[i].style.display = "none";
											}
										}
									}
								}
							</script>	
						
@endsection