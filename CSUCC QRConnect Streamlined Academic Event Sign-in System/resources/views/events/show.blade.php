@extends('layouts.app')

@section('content')
    @extends('layouts.bars')
    <div class="container">
        <div class="card mt-4 ms-auto me-auto d-flex flex-column align-item-center justify-content-center"
            style="width:100%;">
            <img src="{{ asset($event->profile_image) }}" class="img-fluid card-img-top ms-auto me-auto mt-5" alt="..."
                style="width: 50%;">
            <div class="card-body text-center mt-5">
                <h5 class="card-title">{{ $event->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class="card-text"><span class="fw-bold">Description</span> {{ $event->description }}.</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text"><span class="fw-bold">Location:</span> {{ $event->location }}</p>
                </li>
                <li class="list-group-item">
                    <p class="card-text"><span class="fw-bold">Start date and time:</span> {{ $event->start_date_time }}</p>
                </li>
            </ul>
            <div class="card-footer d-flex justify-content-around">
                <a class="btn btn-primary"
                    href="{{ route('event-attendees.checkin', ['event_id' => $event->id]) }}">Attendance Check In</a>

                <a class="btn btn-primary"
                    href="{{ route('event-attendees.checkout', ['event_id' => $event->id]) }}">Attendance Check Out</a>

                <a class="btn btn-primary" href="{{ route('event-attendees.index', ['event_id' => $event->id]) }}">Show
                    Attendance Records</a>

                <a class="btn btn-primary"
                    href="{{ route('event-attendee.exportPdf', ['event_id' => $event->id, 'event_name' => $event->name]) }}">Export
                    Attendance Records as PDF</a>
            </div>
        </div>
    @endsection
