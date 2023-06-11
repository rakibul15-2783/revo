@extends('admin.includes.master')
@section('main-content')  
					<div class="top-bar p-3">
					<h3><strong>Dashboard</strong> View Amount</h3>
					</div>	
                            <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
							<div class="card">
								
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:40%;">Name</th>
											<th style="width:25%">User name</th>
											<th style="width:25%">Amount</th>
											<th style="width:25%">Deposit Date</th>
										</tr>
									</thead>
								<tbody>
								@foreach($deposits as $deposit)
									<tr>
										<td>{{ $deposit->user->name }}</td>
										<td>
                                            {{ $deposit->user->username }}
                                        </td>
										<td>
											{{ $deposit->amount }}	
										</td>
										
                                        
										<td>{{ $deposit->created_at }}</td>	
									</tr>
									@endforeach
								</tbody>
                                
								</table>
							</div>
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
						})
					})
				})
			</script>				
						
			
@endsection
