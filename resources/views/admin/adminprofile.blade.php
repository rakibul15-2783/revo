@extends('admin.includes.master')
@section('main-content')
<h4>Dashboard</h4>
<?php
   use App\Models\User;
   use App\Models\Order;
   use App\Models\Deposit;
   use Carbon\Carbon;

   $totalUsers = User::count();

   $nextDay = Carbon::tomorrow()->toDateString();
   $nextOrders = Order::whereDate('date', $nextDay)->count();


   $date = Carbon::now();
   $thisMonth = $date->format('F');
   $thisMonthOrder = Deposit::where('month', 'like', '%' . $thisMonth . '%')->count();

   
   $todaysOrder = User::count();
 
	

?>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-danger text-center">
							 <div class="card-body">
								<div class=" align-items-center">
									<h2 class="mb-0  text-white">Total User's</h2>
									<div class="ms-auto">
                                        
									</div>
								</div>
								
								<div class=" textcenter p-1 text-white text-center">
									<h2 class="text-white">{{ $totalUsers }}</h2>
									
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-primary text-center">
							 <div class="card-body">
								<div class=" align-items-center">
									<h3 class="mb-0  text-white">Next Order ({{ $nextDay }}) </h3><small></small>
									<div class="ms-auto">
                                        
									</div>
								</div>
								
								<div class=" textcenter p-1 text-white text-center">
									<h2 class="text-white">{{ $nextOrders }}</h2>
									
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-warning text-center">
							 <div class="card-body">
								<div class=" align-items-center">
									<h2 class="mb-0  text-white">{{ $thisMonth }}'s Deposit</h2>
									<div class="ms-auto">
                                        
									</div>
								</div>
								
								<div class=" textcenter p-1 text-white text-center">
									<h2 class="text-white">{{ $thisMonthOrder }}</h2>
									
								</div>
							</div>
						  </div>
						</div>
						
						
					</div><!--end row-->
<script>
   var date = new Date();
var dayOfWeek = date.getDay();

var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var dayName = dayNames[dayOfWeek];

console.log(dayName);
</script>
@endsection