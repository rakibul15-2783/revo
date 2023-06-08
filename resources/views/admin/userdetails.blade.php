
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  

				<div class="row">
					<div class="col-xl-9 mx-auto">
						
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
							<div class="border p-4 rounded text-center ">
                                    <a href="{{ route('order') }}" class="btn btn-sm btn-info">Order Now</a>
                                    <a href="{{ route('seeorder') }}" class="btn btn-sm btn-success">See Order</a>
                                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
                                    @if(Auth::user()->role==2)
                                        <a href="{{ route('orderdetails') }}" class="btn btn-sm btn-warning">Order Details</a>
                                        <a href="{{ route('userdetails') }}" class="btn btn-sm btn-secondary">User Details</a>
                                
                                    @endif
                                </div>
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
						</div>
					</div>
				</div>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>