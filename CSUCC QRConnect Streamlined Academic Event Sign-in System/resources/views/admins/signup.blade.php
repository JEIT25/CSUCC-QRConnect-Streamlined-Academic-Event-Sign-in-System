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
    <div class="container">
        <div class="row">
            <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div class="login-title text-center mt-5">
                    <h2><span>QR<strong>Connect</strong></span></h2>
                </div>
                <div class="login-content">
                    <div class="login-header text-center">
                        <h3><strong>Admin Registration Form</strong></h3>
                        <h5>Please fill out this form with the required information</h5>
                    </div>
                    <div class="login-body">
                        <form form id="myForm" action="{{ route('admins.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="form-fname" type="text" value="{{ old('fname') }}" name="fname"
                                        placeholder="First Name..." class="form-fname form-control">
                                    <i class="fa fa-user"></i>
                                    @error('fname')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="form-lname" type="text" value="{{ old('lname') }}" name="lname"
                                        placeholder="Last Name..." class="form-lname form-control">
                                    <i class="fa fa-user"></i>
                                    @error('lname')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="pos-r">
                                    <input id="form-email" type="email" value="{{ old('email') }}" name="email"
                                        placeholder="Email..." class="form-email form-control">
                                    <i class="fa fa-envelope"></i>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="form-password-confirm" type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" placeholder="Confirm Password..."
                                        class="form-password-confirm form-control">
                                    <i class="fa fa-lock"></i>
                                    @error('password_confirmation')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="valid_school_id_front" type="file" name="valid_school_id_front"
                                        class="valid_school_id form-control">
                                    <i class="fa fa-file"></i>
                                    <label for="valid_school_id_back">Upload CSUCC School ID Front Part</label>
                                    @error('valid_school_id_front')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                    @if (session('valid_school_id_front'))
                                        <div class="alert alert-danger text-center mt-2">
                                            {{ session('valid_school_id_front') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pos-r">
                                    <input id="valid_school_id_back" type="file" name="valid_school_id_back"
                                        class="valid_school_id form-control">
                                    <i class="fa fa-file"></i>
                                    <label for="valid_school_id_back">Upload CSUCC School ID Back Part</label>
                                    @error('valid_school_id_back')
                                        <div class="bg-danger my-2">{{ $message }}</div>
                                    @enderror
                                    @if (session('valid_school_id_back'))
                                        <div class="alert alert-danger text-center mt-2">
                                            {{ session('valid_school_id_back') }}
                                        </div>
                                    @endif
                                    @if (session('valid_school_id'))
                                        <div class="alert alert-danger text-center mt-2">
                                            {{ session('valid_school_id') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control"><strong>Sign
                                        Up</strong></button>
                            </div>
                        </form>
                    </div> <!-- end  login-body -->
                </div><!-- end  login-content -->
                <div class="login-footer text-center template">
                    <h5>Already have an account?<a href="{{ route('login') }}" class="bold"> Log In </a> </h5>
                    <!-- <h5>Bootstrap login template made by <a href="#" class="bold"> Mohamed Azouaoui</a></h5>                    -->
                </div>
            </div> <!-- end  login-container -->
        </div>
    </div><!-- end container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
