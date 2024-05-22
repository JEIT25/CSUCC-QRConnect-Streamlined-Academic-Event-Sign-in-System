@extends('layouts.app')
@section('content')
     @include('layouts.navbar')
    <main class="container-fluid"
        style='background-image: url("{{ asset('assets/images/welcome-bg.png') }}"); background-size: cover;  background-position: center; background-repeat: no-repeat;  height: 100vh;'>
        <div class="container-fluid">
            <div id="main" class="container-fluid d-flex fflex-sm-column justify-content-center align-items-center"
                style="height: 70vh">
                <div class="container-xxl d-flex justify-content-center mt-5">
                    <img src="{{ asset('assets/images/qr-gif.gif') }}" class="img-xxl" alt="..."
                        style="max-width: 100%;">
                </div>
                <div id="main" class="container-fluid d-flex flex-column align-items-l-start text-l-start">
                    <h2 class="display-3 text-warning fw-normal text-wrap" id="h2">Streamedlined Student</h2>
                    <h1 class="display-1 fw-bold text-darkerblue text-wrap" id="h1">Sign-in System</h1>
                    <p class="text-wrap text-break mt-2" id="p-tags"> A cutting-edge solution designed to simplify and
                        optimize the process of
                        attendee check-ins for various academic events. With a focus on
                        efficiency and user-friendliness, our system offers a seamless
                        experience for event organizers and attendees alike.
                    </p>
                </div>
            </div>

            <div class="container-fluid d-flex flex-row justify-content-center align-items-center mt-3">
                <div class="btn-group d-flex align-items-center mx-5 my-5">
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Attendee
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('attendees.create') }}">Generate QR Code</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('attendees.events.list') }}">See Available Events</a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('attendees.retrieveQR') }}">Retrieve Existing QR
                                Code</a></li>
                    </ul>
                </div>

                <div class="btn-group mx-5">
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle d-flex align-items-center"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('signup') }}">Sign Up</a></li>
                    </ul>
                </div>

            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog d-flex justify-content-center">
                <div class="modal-content w-75">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Sign in</h5>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close"
                            data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form>
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="email1" class="form-control" />
                                <label class="form-label" for="email1">Email address</label>
                            </div>

                            <!-- password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="password1" class="form-control" />
                                <label class="form-label" for="password1">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </main>
@endsection
