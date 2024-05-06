@extends('layouts.app')

@section('content')
<div class="text-center mt-4">
    <h1>Retrieve Forgotten QR Code</h1>
    <h5>Please fill-in the email</h5>
</div>
    <form id="myForm" action="{{ route('attendees.retrieveQR.post') }}" method="POST" class="mx-auto mt-3" style="max-width: 50%">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit" id="submitBtn">Submit</button>
        </div>
    </form>
@endsection