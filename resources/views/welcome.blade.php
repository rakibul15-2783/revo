<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
   

</head>
<body>
    <div class="auth-wrapper w-100 vh-100">
        <div class="container-fluid vh-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-6  border m-4 p-4 text-center">
                    <h3 class="text-success">Welcome to meal system</h3>
                    <a href="{{ route('login') }}" class="btn btn-sm btn-info">Login</a>
                     <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register</a>
                </div>
            </div>
        </div>
    </div>
   
    


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


</body>
</html>