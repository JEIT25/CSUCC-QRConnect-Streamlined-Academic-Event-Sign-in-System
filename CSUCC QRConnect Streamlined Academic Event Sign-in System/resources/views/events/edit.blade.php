@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form id="myForm" action="{{ route('events.update', $event->id) }}" method="POST">
            {{-- Add cross-site request forgery (CSRF) token --}}
            @csrf
            @method('PUT') {{-- Use PUT method for updating --}}

            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Event Name"
                    value="{{ old('name', $event->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Event Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" name="description"
                    value="{{ old('description', $event->description) }}"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter Event Location"
                    value="{{ old('location', $event->location) }}">
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="start_date_time" class="form-label">Start Date and Time</label>
                <input type="datetime-local" class="form-control" id="start_date_time" name="start_date_time"
                    value="{{ old('start_date_time', date('Y-m-d\TH:i:s', strtotime($event->start_date_time))) }}">
                @error('start_date_time')
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
