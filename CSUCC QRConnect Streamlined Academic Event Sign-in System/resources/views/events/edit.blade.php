@extends('layouts.app')

@section('content')
    <H1>Edit Event</H1>
    <form id="myForm" action="{{ route('events.update', $event->id) }}" method="POST">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf
        @method('PUT') {{-- Use PUT method for updating --}}

        <div>
            <label for="name">Event Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Event Name" value="{{ old('name', $event->name) }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" value="{{ old('description', $event->description) }}">
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" placeholder="Enter Event Location" value="{{ old('location', $event->location) }}">
            @error('location')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="start_date_time">Start Date and Time</label>
            <input type="datetime-local" name="start_date_time" id="start_date_time" value="{{ old('start_date_time', date('Y-m-d\TH:i:s', strtotime($event->start_date_time))) }}">
            @error('start_date_time')
                <div>{{ $message }}</div>
            @enderror
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
