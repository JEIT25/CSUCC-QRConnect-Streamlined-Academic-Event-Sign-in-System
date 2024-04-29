@extends('layouts.app')

@section('content')
    <div class="card mt-4 ms-auto me-auto d-flex flex-column align-item-center justify-content-center" style="width: 60%;">
        <img src="{{ asset($event->profile_image) }}" class="img-fluid card-img-top ms-auto me-auto " alt="..."
            style="width: 50%;">
        <div class="card-body text-center">
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
            <a class="btn btn-primary" href="{{ route('event-attendees.create', ['event_id' => $event->id]) }}">Scan QR
                Code and Generate Attendance</a>

            <a class="btn btn-primary" href="{{ route('event-attendees.index', ['event_id' => $event->id]) }}">Show
                Attendance Records</a>
        </div>
    @endsection
