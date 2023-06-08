
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
  

				<div class="row">
					<div class="col-xl-9 mx-auto">
						
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body text-center">
								<div class="border p-4 rounded">
                                @if ($orders->isEmpty())
                                    <p class="text-info">No orders found.</p>
                                @else
                                <h4 class="text-info">Your Order List</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order List</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($orders as $order)
                                    
                                        <tr>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->Item }}</td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                    </table>
                                    @endif
                                
								</div>
							</div>
						</div>
					</div>
				</div>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>