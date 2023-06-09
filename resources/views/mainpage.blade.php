<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
					<div class="col-xl-9 mx-auto p-4">
						
						<div class="card ">
							<div class="card-body">
								<div class="border p-4 rounded text-center ">
                                    <h4>Welcome, {{ Auth::user()->name }}  </h4>
                                    <a href="{{ route('order') }}" class="btn btn-sm btn-info">Order Now</a>
                                    <a href="{{ route('seeorder') }}" class="btn btn-sm btn-success">See Order</a>
                                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
                                    
                                </div>
									
							</div>
						</div>
					</div>
				</div>
    
</body>
</html>