
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
					<div class="col-xl-6 mx-auto p-4">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
									</div>
						
                                    
                                    <form action="{{ route('ordersuccess') }}" method="POST">
                                       @csrf
									<div class="row mb-3">
										<label for="date" class=" col-sm-3 col-form-label">Date </label>
										<div class="col-sm-9">
											<input type="date" name="date" value="{{ old('date') }}" class="date form-control" id="date" placeholder="Choose Date">
                                             @error('date')
                                              <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        </div>
                                        
									</div>

									<div class="row mb-3">
										<label for="item" class="col-sm-3 col-form-label">Item</label>
										<div class="col-sm-9">
											<input type="text" name="item" value="{{ old('item') }}" class="item form-control" id="item" placeholder="Write your food name">
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
								</div>
							</div>
						</div>
					</div>
				</div>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>