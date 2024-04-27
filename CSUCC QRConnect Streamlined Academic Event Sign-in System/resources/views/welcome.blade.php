@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
@section('content')
    <nav class="navbar navbar-expand-lg navbar">
        <div class="container-fluid">
            <a class="text-warning fw-bold navbar-brand ms-5" href="#">QRConnect</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5"> <!-- Added ml-auto class here -->
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

    <main>
        <div class="container-fluid">
            <div class="container-fluid">
                <img src="{{ asset('assets/images/qr-gif.gif') }}" class="img-fluid" alt="...">
            </div>
            
            <div class="container-fluid">
                <h1>Streamedlined Student <br><span>Sign-in System</span></h1>
                <p class="par"> Ako`y tahimik lang sa umpisa <br>
                    Kahit di moko pilitin Malasing mo lang ako <br>
                    Agad sasama
                    Kahit di mo ko akitin <br>
                    Meron ka bang lemon
                    Gusto kong tequila <br>
                    Pagkatapos kong mag shot
                    Silhig mo aking sst bad </p>
            </div>
        </div>
        </div>
    </main>
@endsection
