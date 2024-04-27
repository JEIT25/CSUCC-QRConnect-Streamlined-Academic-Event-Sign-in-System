@extends('layouts.app')

@section('content')
    <img src="{{ asset($event->profile_image) }}" style="max-width: 40%;"/>
    <h2>{{ $event->name }}</h2>
    <h2>{{ $event->description }}</h2>
    <h2>{{ $event->location }}</h2>
    <h2>{{ $event->start_date_time }}</h2>
@endsection

<form action="{{ route('events.destroy',$event) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete</button>
</form>

<a href="{{route('event-attendees.create',['event_id' => $event->id])}}"><button>Qr Code Record Attendance</button></a>

<a href="{{route('event-attendees.index',['event_id' => $event->id])}}">Show Attendance Records</a>

