<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>User Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 100px;
            border-radius: 10px;
        }
        .card-body {
            padding: 40px;
        }
        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .action-buttons {
            margin-top: 20px;
        }
        .action-buttons .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    
                    <div class="text-center">
                        
                        <h2 class="welcome-message">Welcome, {{ Auth::user()->name }}</h2>
                        <div class="action-buttons">
                            <a href="{{ route('order') }}" class="btn btn-primary">Order Now</a>
                            <a href="{{ route('seeorder') }}" class="btn btn-success">See Orders</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                            @if(Auth::user()->role == 0 || Auth::user()->role == 2)
                                <a href='{{ route("adminprofile") }}' class="btn btn-warning">Admin Dashboard</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
