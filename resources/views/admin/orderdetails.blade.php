@extends('admin.includes.master')
@section('main-content')  
<?php
use Carbon\Carbon;
?>

					<div class="top-bar p-3">
					<h4><strong>Dashboard</strong> Order Details</h4>
					</div>	
					
				<div class="row">
					<!-- for email and name searching -->
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="search" placeholder="Search by the name/email" class="form-control" value="{{ $searchQuery}}">
							<button class="btn bg-info search-btn" type="submit">
							Search
							</button>

							</div>
						</form>
					</div>
					<!-- for order searching -->
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="searchbyorder" placeholder="Search by order" value="{{ $searchQueryByOrder}}" class="form-control">
							<button class="btn bg-info search-btn" type="submit">
							Search
							</button>

							</div>
						</form>
					</div>
					<!-- for progress searching -->
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="searchbyprogress" placeholder="Search by Progress" value="{{ $searchQueryByProgress}}" class="form-control">
							<button class="btn bg-info search-btn" type="submit">
							Search
							</button>

							</div>
						</form>
					</div>
					<!-- for date searching -->
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="searchbydate" placeholder="Search by Date" value="{{ $searchQueryByDate}}" class="form-control">
							<button class="btn bg-info search-btn" type="submit">
							Search
							</button>

							</div>
						</form>
					</div>
					
				</div>
					<div class="row">
						<div class="col">
						<a href="{{ route('orderdetails') }}" class="btn bg-danger cancel-search m-2 text-dark"  type="submit">Cancel Search</a>
						</div>
							
					</div>
					
					<div class="card-body">
                            <div class="border p-4 rounded">
                            <div class="table-responsive">
							<table id="myTable" class="table table-striped table-bordered" style="width:100%">
							<div class="card">
							<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:30%;">Name</th>
											<th style="width:25%;">Date</th>
											<th style="width:25%;">Day</th>
											<th style="width:25%">Order</th>
											<th style="width:25%">Progress</th>
											<th style="width:25%">Action</th>
										</tr>
									</thead>
								<tbody>
								@foreach($orders as $order)
									<tr>
										<td>{{ $order->user->name }}</td>
										<td>{{ $order->date }}</td>
										<td>
											{{ Carbon::parse($order->date)->format('l') }}</td>
										<td>
                                            {{ $order->Item }}
                                        </td>
										<td>
											@if($order->action == 1)
											<button value = "{{ $order->id }}" class="btn btn-sm btn-warning btn-order-process">Prosessing</button>
											@else
											<a href="" class="btn btn-sm btn-success">Accept</a>
											@endif		
										</td>
										
                                        
										<td>
												<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
												<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
										</td>	
									</tr>
								@endforeach
								</tbody>
                                
								</table>
								
							</div>
						</div>
					</div>
					{{ $orders->appends(request()->except('page'))->links() }}
					
				</div>
				            <!-- jQuery cdn -->
								<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>			</div>
			<!-- jQuery for accept order -->
			<script>
				jQuery(document).ready(function(){
					jQuery(document).on("click",".btn-order-process",function(){
						var id = jQuery(this).val();
						jQuery.ajax({
							url: "orderaccept/" + id,
							type: "get",
							success: function(res){
								alert(res.msg);
							}
						});
					});
					
				});
			</script>	
			
@endsection
