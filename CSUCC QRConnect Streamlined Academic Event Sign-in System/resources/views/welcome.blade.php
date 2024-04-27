@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
@section('content')
    <nav class="bg-darkblue navbar-expand-lg navbar">
        <div class="container-fluid">
            <a class="text-warning fw-bold navbar-brand ms-5" href="#">
                 <img src="{{ asset('assets/images/qr-gif.gif') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-center">
                CSUCC QRConnect
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-warning nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid"
        style='background-image: url("{{ asset('assets/images/welcome-bg.png') }}"); background-size: cover;  background-position: center; background-repeat: no-repeat;  height: 100vh;'>
        <div class="container-fluid">

            <div class="container-fluid d-flex flex-row justify-content-center align-items-center" style="height: 70vh">
                <div class="container-xxl container-sm d-flex justify-content-center">
                    <img src="{{ asset('assets/images/qr-gif.gif') }}" class="img-xxl" alt="...">
                </div>
                <div class="container-fluid">
                    <h2 class="display-3 text-warning fw-normal">Streamedlined Student</h2>
                    <h1 class="display-1 fw-bold text-darkerblue">Sign-in System</h1>
                    <p class="par"> Ako`y tahimik lang sa umpisa <br>
                        Kahit di moko pilitin Malasing mo lang ako <br>
                        Agad sasama
                        Kahit di mo ko akitin <br>
                        Meron ka bang lemon
                        Gusto kong tequila <br>
                        Pagkatapos kong mag shot
                        Silhig mo aking sst bad
                    </p>
                </div>
            </div>

            <div class="container-fluid d-flex flex-row justify-content-center align-items-center">
                <div class="btn-group d-flex align-items-center  mx-5">
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Attendee
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Generate QR Code</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">See Available Events</a></li>
                    </ul>
                </div>

                <div class="btn-group mx-5">
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Log In</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign Up</a></li>
                    </ul>
                </div>

            </div>
        </div>
        </div>
    </main>
@endsection
