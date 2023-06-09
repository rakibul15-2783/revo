
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php  ?>

				<div class="row">
					<div class="col-xl-9 mx-auto p-4">
						
							<div class="card-body">
								<div class="border p-4 rounded">
									
                                    <form action="{{ route('adminloginpost') }}" method="POST">
                                       @csrf
									<div class="row mb-3">
										<label for="email" class=" col-sm-3 col-form-label">Enter Your Email </label>
										<div class="col-sm-9">
											<input type="email" name="email" value="{{ old('email') }}" class="email form-control" id="email" placeholder="Enter Your Email">
                                            @error('email')
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
									
									
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class=" btn btn-info px-5">Login</button>
											<a href="{{ route('register') }}" class=" btn btn-info px-5">Register Here</a>
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