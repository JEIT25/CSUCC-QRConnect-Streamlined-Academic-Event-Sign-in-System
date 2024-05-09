@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Forgot Password?</h5>
                            <p class="mb-2">Enter your registered email to reset the password of your admin account</p>
                        </div>
                        <form method="POST" action="{{ route('forgot.password.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Enter Your Email" required>
                                @error('email')
                                    <span class="text-danger text-center">{{ $message }}</span>
                                @enderror
                                @if (session('success'))
                                    <span class="text-success text-center">{{ session('success') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                            <span>Don't have an account? <a href="{{ route('login') }}">Sign in</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
