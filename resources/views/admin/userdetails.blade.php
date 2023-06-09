
@extends('admin.includes.master')
@section('main-content')  
  

				
                            <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Role</th>
                                        <th>Action</th>
									</tr>
								</thead>
                                @foreach($users as $user)
                                
								<tbody>
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->phone }}</td>
										<td>
                                            @if($user->role==1)
                                              <a href="" class="btn btn-info">User</a>
                                            @else
                                              <a href="" class="btn btn-success">Admin</a>

                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
									</tr>
									
								</tbody>
                                @endforeach
								<tfoot>
                                <tr>
										<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Phone Number</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
								</tfoot>
							</table>
							</div>
						
@endsection