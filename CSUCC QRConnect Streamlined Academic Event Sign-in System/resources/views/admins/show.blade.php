@extends('layouts.app')

@section('content')
@extends('layouts.bars')
    <div class="container">
        <div class="row justify-content-center" style="max-width: 100%">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header text-center">Admin Profile</div>
                    <div class="card-body text-center py-5">
                        <p><strong>First Name:</strong> {{ $admin->fname }}</p>
                        <p><strong>Last Name:</strong> {{ $admin->lname }}</p>
                        <p><strong>Email:</strong> {{ $admin->email }}</p>

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
