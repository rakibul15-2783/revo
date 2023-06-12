@extends('admin.includes.master')
@section('main-content')  
					<div class="top-bar p-3">
					<h4><strong>Dashboard</strong> View Amount</h4>
					</div>	
					
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="search" placeholder="Search by the name" value="{{ Request::get('search') }}" class="form-control">
							<a href="{{ route('userdetails') }}" class="btn bg-danger " type="submit">
							Cancel
                            </a>

							</div>
						</form>
					</div>
					
                            <div class="table-responsive">
							<table id="myTable" class="table table-striped table-bordered" style="width:100%">
							<div class="card">
								
								
									<thead>
										<tr>
											<th style=" width:40%;">Name</th>
											<th style="width:25%">Amount</th>
											<th style="width:25%">Month</th>
											<th style="width:25%">Deposit Date</th>
										</tr>
									</thead>
								<tbody>
								@foreach($deposits as $deposit)
									<tr>
										<td>{{ $deposit->user->name }}</td>
										
										<td>
											{{ $deposit->amount }}	
										</td>
										<td>
											{{ $deposit->created_at->format('F')}}	
										</td>
										
                                        
										<td>{{ $deposit->created_at->format('F j, Y, g:i A') }}</td>
	
									</tr>
									@endforeach
								</tbody>
                                
								</table>
							</div>
</div>
</div>
				          	
			
@endsection
