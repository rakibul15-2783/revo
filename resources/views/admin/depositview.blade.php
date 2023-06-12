@extends('admin.includes.master')
@section('main-content')  
					<div class="top-bar p-3">
					<h4><strong>Dashboard</strong> View Amount</h4>
					</div>	
					<input type="text" id = "myInput" placeholder ="Search by the name" onkeyup="searchFunction()"><br><br>
					{{ $deposits->links() }}
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
