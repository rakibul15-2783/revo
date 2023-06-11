
@extends('admin.includes.master')
@section('main-content')
                    <div class="top-bar p-3">
					<h3><strong>Dashboard</strong> Make Order</h3>
					</div>	

					<div class="col-xl-6 mx-auto p-4">
							<div class="card-body">
								<div class="border p-4 rounded">
								

									<!-- make order for user from admin panel -->
                                    <form action="{{ route('makeordersuccess') }}" method="POST">
                                       @csrf
									<div class="row mb-3">
										<label for="date" class=" col-sm-3 col-form-label">Username</label>
										<div class="col-sm-9">
											<input type="text" name="username" value="{{ old('Username') }}" required  class="username form-control" id="username" placeholder="Type Username">
                                             @error('username')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                        
									</div>
									<div class="row mb-3">
										<label for="date" class=" col-sm-3 col-form-label">Date </label>
										<div class="col-sm-9">
											<input type="date" name="date" value="{{ old('date') }}" required  class="date form-control" id="date" placeholder="Choose Date">
                                             @error('date')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                        
									</div>

									<div class="row mb-3">
										<label for="item" class="col-sm-3 col-form-label">Item</label>
										<div class="col-sm-9">
											<input type="text" name="item" value="{{ old('item') }}" required class="item form-control" id="item" placeholder="Write user's food name">
                                            @error('item')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" name="submit" class="submit btn btn-info px-5">Submit Order</button>
											
										</div>
									</div>
                                    </form>
                                    <!-- if username is not mathched from user table -->
                                    <div class="mt-3 ">
                                        @if(session('error'))
                                            <div class="alert alert-danger ">{{ session('error') }}</div>
                                        @endif
                                    </div>
								</div>
							</div>
						</div>
 <!-- don't make todays order when it past 5.00 pm and previous days -->
<script>
	var date = new Date;
	var tDate = date.getDate();
	var month = date.getMonth() + 1;
	var currentHour = date.getHours();
	
    if(currentHour > 16){
			tDate = tDate + 1;
			if(tDate < 10){
				tDate = "0" + tDate;
			}
			if(month < 10){
				month = "0" + month;
			}

			var year = date.getUTCFullYear();
			var minDate = year + "-" + month + "-" + tDate;
			document.getElementById("date").setAttribute('min', minDate);
	}
	else{
			if(tDate < 10){
				tDate = "0" + tDate;
			}
			if(month < 10){
				month = "0" + month;
			}
			var year = date.getUTCFullYear();
			var minDate = year + "-" + month + "-" + tDate;
			document.getElementById("date").setAttribute('min', minDate);
	}
	
</script>

@endsection