@extends('admin.includes.master')
@section('main-content')
					<div class="top-bar p-3">
					<h4><strong>View Amount</strong> </h4>
					</div>
					<!-- for searching -->
				<div class="row">
					<div class="col-md-3 my-auto">
						<form role = "search" method="GET" action="">
							<div class="input-group">
							<input type="search" name="search" value="{{ $searchQuery }}" placeholder="Search by name/email/amount" class="form-control">
							<button class="btn bg-info " type="submit">
							Search
							</button>
							@if ($searchQuery)
									<a class="text-danger btn "  href="{{ route('depositview') }}"><i class="fa-solid fa-xmark fa-lg"></i></a>
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
											{{ $deposit->month}}
										</td>
										<td>{{ $deposit->created_at->format('Y-m-d') }}</td>
									</tr>
									@endforeach
								</tbody>
								</table>
							</div>
					</div>
					</div>
			{{ $deposits->links() }}
			</div>

</div>
				           		<!-- javascript search but didn't apply in this blade -->
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
