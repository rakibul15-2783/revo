<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/img/favicon.ico" />
    <title>Meal System Login</title>
    <link href="{{ asset('admin') }}/assets/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="auth-wrapper w-100 vh-100">
        <div class="container vh-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-10">
                    <div class="auth-site-logo text-center mb-4">
                        <img height="50px" class="auth-logo" src="{{ asset('admin') }}/assets/img/logo.png" alt="Revo Int.">
                    </div>
                    <div class="card">
                        <div class="card-body bg-primary p-lg-0">
                            <div class="row align-items-center">
                                <div class="col-lg-6 bg-white h-100 p-4 d-none d-lg-block">
                                    <img class="w-100" src="{{ asset('admin') }}/assets/img/login.png" alt="Revo Login Page">
                                </div>
                                <div class="auth-form pl-lg-5 pr-lg-5">
                                    <h1 class="text-white mb-4"><strong>Welcome!</strong></h1>

                                    <form action="{{ route('loginpermission') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label text-white">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email"> @error('email')
                                            <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-white">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password"> @error('password')
                                            <span class="text-danger">{{ $message }}</span> @enderror
                                            <small>
                                                <a class="text-white" href="">Forgot password?</a>
                                            </small>
                                        </div>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me">
                                                <span class="form-check-label text-white">
                                                        Remember me
                                                    </span>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-center m-3">
                                            <button type="submit" class="btn btn-lg btn-success mx-3 ">Sign In</button>
                                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg">Sign Up</a>
                                        </div>
                                        <div class="d-flex justify-content-center m-3">
                                            <a href="{{ route('google') }}" class="text-white mx-2">Sign in with Google</a>
                                            <a href="{{ route('facebook') }}" class="text-white mx-2">Sign in with Facebook</a>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

</body>

</html>
