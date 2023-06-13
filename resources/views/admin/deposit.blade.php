@extends('admin.includes.master')
@section('main-content')
                    <div class="top-bar p-3">
					<h4><strong>Dashboard</strong> Deposit</h4>
					</div>	
				
					<div class="col-xl-6 mx-auto p-4">
							<div class="card-body">
                            <div class="border p-4 rounded">
								
                                    <form  action="{{ route('depositpost') }}" method="POST">
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
										<label for="month" class=" col-sm-3 col-form-label ">Month</label>
										<div class="col-sm-9 ">
											<select class="form-control " required name="month" id="month">
												<option value="">-----Select Month-----</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
											@error('month')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
											
                                        </div>
                                        
									</div>

									<div class="row mb-3">
										<label for="item" class="col-sm-3 col-form-label">Amount</label>
										<div class="col-sm-9">
											<input type="number" name="amount" value="{{ old('amount') }}" required class="amount form-control" id="amount" placeholder="How much amount you deposit?">
                                            @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" name="submit" class="submit btn btn-info px-5">Deposit</button>
											
										</div>
									</div>

									<div id="errorMessage" class="mt-3 alert alert-danger fade" role="alert"></div>

                                    </form>
                                    
								</div>
							</div>
						</div>
					</div>
				</div>
                
                

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
@endsection