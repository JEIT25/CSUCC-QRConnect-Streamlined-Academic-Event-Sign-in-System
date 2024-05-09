@extends('layouts.app')

@section('content')
    @extends('layouts.bars')
    <div class="container">
        <div class="row justify-content-center" style="max-width: 100%">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-image-top mx-auto mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="80" height="80">
                            <path fill="black"
                                d="M12 2.5a5.25 5.25 0 0 0-2.519 9.857 9.005 9.005 0 0 0-6.477 8.37.75.75 0 0 0 .727.773H20.27a.75.75 0 0 0 .727-.772 9.005 9.005 0 0 0-6.477-8.37A5.25 5.25 0 0 0 12 2.5Z">
                            </path>
                        </svg>
                    </div>
                    <div class="card-header text-center">Admin Profile</div>
                    <div class="card-body text-center py-5 text-capitalize">
                        <p><strong>First Name:</strong> {{ $admin->fname }}</p>
                        <p><strong>Last Name:</strong> {{ $admin->lname }}</p>
                        <p class="text-lowercase"><strong class="text-capitalize">Email:</strong> {{ $admin->email }}</p>

                        <!-- Forgot Password Button -->
                        <a href="{{ route('forgot.password') }}" class="btn btn-primary">
                            Forgot Password
                        </a>

                        <!-- my aevents route-->
                        <a href="{{ route('events.index') }}" class="btn btn-primary">
                            My Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
