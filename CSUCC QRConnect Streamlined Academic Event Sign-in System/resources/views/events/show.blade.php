@extends('layouts.app')

@section('content')
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
