
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal System Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  

				<div class="row">
					<div class="col-xl-9 mx-auto">
						
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Registration</h5>
									</div>
						
                                    
                                    <form action="{{ route('insesrtuser') }}" method="POST">
                                       @csrf
									<div class="row mb-3">
										<label for="name" class=" col-sm-3 col-form-label">Enter Your Name </label>
										<div class="col-sm-9">
											<input type="text" name="name" value="{{ old('name') }}" class="name form-control" id="name" placeholder="Enter Your Name">
                                             @error('name')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                        
									</div>

									<div class="row mb-3">
										<label for="email" class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" name="email" value="{{ old('email') }}" class="email form-control" id="email" placeholder="Email">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="username" class=" col-sm-3 col-form-label">Username </label>
										<div class="col-sm-9">
											<input type="text" name="username" value="{{ old('username') }}" class="username form-control" id="name" placeholder="Username">
                                             @error('username')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                        
									</div>

									<div class="row mb-3">
										<label for="phone" class="col-sm-3 col-form-label">Phone</label>
										<div class="col-sm-9">
											<input type="tel" name="phone" pattern="[0-9]{11}" required value="{{ old('phone') }}" class="phone form-control" id="phone" placeholder="11 digit of your phone number">
                                            @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="password" class="col-sm-3 col-form-label">Password</label>
										<div class="col-sm-9">
											<input type="password" name="password" class="password form-control" id="password" placeholder="Password">
                                            @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputChoosePassword" class="col-sm-3 col-form-label">Confirm Password</label>
										<div class="col-sm-9"  id="show_hide_password">
											<input type="password" name="password_confirmation" class="password form-control" id="inputChoosePassword" placeholder="Confirm Password">
                                            
										</div>
									</div>
                                    
									
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" name="submit" class="submit btn btn-info px-5">Register</button>
											<a href="{{ route('login') }}" class=" btn btn-info px-5">Login here</a>
											<a href="{{ route('google') }}" class=" btn btn-info px-5">Signup with Google</a>
										</div>
									</div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>