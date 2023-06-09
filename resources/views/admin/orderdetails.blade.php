@extends('admin.includes.master')
@section('main-content')  

				
                            <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Order</th>
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
                                            @foreach($user->orders as $order)
                                                 {{ $order->Item }} 
                                            @endforeach
                                        </td>
										
										<td>
                                            @if($user->role==1)
                                              <b>User</b>
                                            @else
                                              <b>Admin</b>

                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info">Edit Item</a>
                                            <a href="" class="btn btn-danger">Delete Item</a>
                                        </td>
									</tr>
									
								</tbody>
                                @endforeach
								<tfoot>
                                <tr>
                                		<th>Full Name</th>
										<th>User Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Order</th>
										<th>Role</th>
                                        <th>Action</th>
									</tr>
								</tfoot>
							</table>    
							</div>
						

@endsection
