<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth-create.css') }}">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>

<body style="background: url('{{ asset('assets/images/auth-bg.jpg') }}')">
    <div class="container ">
        <div class="row">
            <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="login-title text-center">
                    <h2><span>QR<strong>Connect</strong></span></h2>
                </div>
                <div class="login-content">
                    <div class="login-header ">
                        <h3><strong>Welcome Admin,</strong></h3>
                        <h5>Generate and manage events seamlessly with CSUCC QRConnect</h5>
                    </div>
                    <div class="login-body">
                        <form role="form" action="{{ route('auth.store') }}" method="post" class="login-form">
                            @csrf
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="form-username" type="text" value="{{ old('email') }}" name="email"
                                        placeholder="Email..." class="form-username form-control">
                                    <i class="fa fa-user"></i>
                                    @error('email')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="form-password" type="password" name="password"
                                        value="{{ old('password') }}" placeholder="Password..."
                                        class="form-password form-control">
                                    <i class="fa fa-lock"></i>
                                    @error('password')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                    @if (session()->has('error'))
                                        <div class="bg-danger my-2 text-center">
                                            <p>{{ session('error') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-check d-flex justify-content-around align-items-center">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="remember-me" style="outline: none;">
                                    <label class="form-check-label" for="remember-me">Remember Me</label>
                                </div>
                                <a href="{{ route('forgot.password') }}" class="bold ml-2"> Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control"><strong>Log
                                        in</strong></button>
                            </div>

                        </form>
                    </div> <!-- end  login-body -->
                </div><!-- end  login-content -->
                <div class="login-footer text-center template">
                    <h5>Don't have an account?<a href="{{route('signup')}}" class="bold"> Register </a> </h5>
                    <!-- <h5>Bootstrap login template made by <a href="#" class="bold"> Mohamed Azouaoui</a></h5>                    -->
                </div>
            </div> <!-- end  login-container -->
        </div>
    </div><!-- end container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
