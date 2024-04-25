@extends('layouts.app')

@section('content')
    <form id="myForm" action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf
        <div>
            <section>
                <input type="text" name="fname" placeholder="First Name" value="{{ old('fname') }}">
                @error('fname')
                    <div>{{ $message }}</div>
                @enderror
            </section>
            <section>
                <input type="text" name="lname" placeholder="Last Name" value="{{ old('lname') }}">
                @error('lname')
                    <div>{{ $message }}</div>
                @enderror
            </section>
        </div>

        <div>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="valid_id_image">Upload Valid School CSUCC ID for Verification</label>
            <input type="file" name="valid_school_id" id="valid_id_image">
            @error('valid_school_id')
                <div>{{ $message }}</div>
            @enderror
            @if (session()->has('invalid_id'))
                <div>
                    <p>{{ session('invalid_id') }}</p>
                </div>
            @endif
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <!-- Include individual JavaScript files -->
    @push('scripts')
        {{-- <script src="{{ asset('assets/js/attendees/create.js') }}"></script> --}}
    @endpush
@endsection
