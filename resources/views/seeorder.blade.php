<?php use Carbon\Carbon; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 100px;
            border-radius: 10px;
            border-top: 0;
            border-bottom: 0;
            border-left: 4px solid #17a2b8;
            border-right: 4px solid #17a2b8;
        }
        .card-body {
            padding: 20px;
        }
        .btn-action {
            margin-right: 5px;
        }
        .badge-processing {
            background-color: #ffc107;
            color: #000;
        }
        .badge-done {
            background-color: #28a745;
            color: #fff;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a href="{{ route('order') }}" class="btn btn-info btn-action">Order Now</a>
                        <a href="{{ route('seeorder') }}" class="btn btn-success btn-action">See Orders</a>
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-action">Logout</a>
                    </div><br><br><br>
                    <div class="border p-4 rounded">
                        @if ($orders->isEmpty())
                            <p class="text-info">No orders found.</p>
                        @else
                            <h4 class="text-info">Your Order List</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Time</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Order Day</th>
                                        <th scope="col">Order List</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->sortByDesc('created_at') as $order)
                                        <tr>
                                            <td>{{ $order->created_at->format('F j, Y, g:i A') }}</td>
                                            <td>{{ $order->date }}</td>
                                            <td>{{ Carbon::parse($order->date)->format('l') }}</td>
                                            <td>{{ $order->Item }}</td>
                                            <td>
                                                @if($order->action == 1)
                                                    <span class="badge badge-processing">Processing</span>
                                                @else
                                                    <span class="badge badge-done">Done</span>
                                                @endif
                                            </td>
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