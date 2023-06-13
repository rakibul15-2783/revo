
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ 'admin' }}/assets/img/favicon.ico" />
    <title>Revo Admin &amp; Dashboard Template</title>
    <link href="{{ 'admin' }}/assets/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="auth-wrapper w-100 vh-100">
        <div class="container vh-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-10">
                    <div class="auth-site-logo text-center mb-4">
                        <img height="50px" class="auth-logo" src="{{ 'admin' }}/assets/img/logo.png" alt="Revo Int.">
                    </div>
                    <div class="card">
                        <div class="card-body bg-primary p-lg-0">
                            <div class="row align-items-center">
                                <div class="col-lg-6 bg-white h-100 p-4 d-none d-lg-block">
                                    <img class="w-100" src="{{ 'admin' }}/assets/img/login.png" alt="Revo Login Page">
                                </div>
                                <div class="col-lg-6">
                                    <div class="auth-form pl-lg-5 pr-lg-5">
                                        <h1 class="text-white mb-4"><strong>Register Now!</strong></h1>
                                        <form action="POST" action="{{ route('insesrtuser') }}" >
											@csrf 
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="text" id="name" name="name" placeholder="Enter your full name"> @error('name')
                                                <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="text" id="username" name="username" placeholder="Username"> @error('username')
                                                <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email"> @error('email')
                                                <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="tell" name="phone"  pattern="[0-9]{11}" required value="{{ old('phone') }}" placeholder="11 digit of your phone number"> @error('phone')
                                                <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password"> @error('password')
                                                <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Confirm password">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" name="submit" class="btn btn-lg btn-warning w-50 mr-2 border-warning">Sign Up</button>
                                               
												<a href="{{ route('login') }}" class="btn btn-lg border-white text-white w-40">Sign In</a>
                                            </div>
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
    </div>

    <script src="{{ 'admin' }}/assets/js/app.js"></script>

</body>

</html>