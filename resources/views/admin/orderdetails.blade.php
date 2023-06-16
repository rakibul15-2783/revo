@extends('admin.includes.master')
@section('main-content')  
<?php
use Carbon\Carbon;
?>

					<div class="top-bar p-3">
					<h4><strong>Dashboard</strong> Order Details</h4> 
					</div>	
					
					<div class="row">
						<div class="col-md-9 my-auto">
							<form role="search" method="GET" action="">
								<div class="input-group">
									
									<input type="search" name="search" placeholder="Search name/email/phone/order" class="form-control" value="{{ $searchQuery }}">
									<select name="searchbyprogress" class="form-control">
										<option value="">Search by Progress</option>
										<option value="2" @if ($searchQueryByProgress == '2') selected @endif>Accept</option>
										<option value="1" @if ($searchQueryByProgress == '1') selected @endif>Processing</option>
									</select>
									<input type="text" placeholder="Choose Date" value="{{ $dateRange }}" name="daterange"/>
									<button type="submit" class="btn bg-info search-btn">Search</button>
									<!-- if get search then visualize cancel button -->
									@if ($searchQuery || $searchQueryByProgress || $dateRange)
										<a class="text-danger btn "  href="{{ route('orderdetails') }}"><i class="fa-solid fa-xmark fa-lg"></i></a>
									@endif
								</div>
							</form>
							
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
								<tbody class="orderdata">
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
				</div>
		
@endsection
@section('js')
<!-- jQuery for accept order -->
<script>
				jQuery(document).ready(function() {
					show();
					jQuery(document).on("click", ".btn-order-process", function() {
						var id = jQuery(this).val();
						jQuery.ajax({
						url: "orderaccept/" + id,
						type: "get",
						success: function(res) {
							alert(res.msg);
							show();
						}
						});
					});
					// Define the show function
					function show() {
						jQuery.ajax({
						url: "/orderdetails/show",
						type: "get",
						dataType: "json",
						success: function(res) {
							var alldata = "";

							jQuery.each(res.data, function(key, val) {
							var actionButton = '';
							if (val.action == 1) {
								actionButton = '<button value="' + val.id + '" class="btn btn-sm btn-warning btn-order-process">Processing</button>';
							} else {
								actionButton = '<a href="#" class="btn btn-sm btn-success">Accept</a>';
							}

							alldata += '<tr>\
								<td>' + val.user.name + '</td>\
								<td>' + val.date + '</td>\
								<td>' + moment(val.date).format("dddd") + '</td>\
								<td>' + val.Item + '</td>\
								<td>' + actionButton + '</td>\
								<td>\
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>\
								<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>\
								</td>\
							</tr>';
							});

							// Append the new data to the existing table body
							jQuery(".orderdata").append(alldata);
						}
						});
					}

					// Call the show function initially to display the existing data
					//show();

					// Add event listeners for dynamic buttons
					
					});
					
			
		</script>

			<!-- Date range picker -->
			<script>
				
					$(function() {
						$('input[name="daterange"]').daterangepicker({
							opens: 'left',
							autoUpdateInput: false // Disable auto-update of the input value
						}, function(start, end, label) {
							console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
						});

						// Handle the apply button click event
						$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
							// Update the input value with the selected date range
							$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
						});

						// Handle the cancel button click event
						$('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
							// Clear the input value when canceled
							$(this).val('');
						});
					});
			</script>	
@endsection
