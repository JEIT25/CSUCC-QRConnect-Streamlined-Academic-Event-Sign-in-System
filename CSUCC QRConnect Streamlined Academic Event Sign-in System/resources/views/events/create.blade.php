@extends('layouts.app')

@section('content')
<div class="container">
    <form id="myForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Event Name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter Event Description">{{ old('description')}}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Event Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Event Location" value="{{ old('location') }}">
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date_time" class="form-label">Start Date and Time</label>
            <input type="datetime-local" class="form-control" id="start_date_time" name="start_date_time" value="{{ old('start_date_time', date('Y-m-d\TH:i:s')) }}">
            @error('start_date_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="profile_image" class="form-label">Event Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
            @error('profile_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- Include individual JavaScript files -->
@push('scripts')
    {{-- <script src="{{ asset('assets/js/attendees/create.js') }}"></script> --}}
@endpush
@endsection
