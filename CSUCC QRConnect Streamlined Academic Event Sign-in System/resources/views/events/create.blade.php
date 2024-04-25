@extends('layouts.app')

@section('content')
    <form id="myForm" action="{{ route('events.store') }}" method="POST">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf
        <div>
            <section>
                <input type="text" name="name" placeholder="Enter Event Name" value="{{ old('name') }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </section>
        </div>

        <div>
            <input type="text" name="description" placeholder="Description" value="{{ old('description') }}">
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="text" name="location" placeholder="Enter Event Location" value="{{ old('location') }}">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="start_date_time">Start Date and Time</label>
            <input type="datetime-local" name="start_date_time" value="{{ old('start_date_time', date('Y-m-d\TH:i:s')) }}" id="start_date_time">
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
