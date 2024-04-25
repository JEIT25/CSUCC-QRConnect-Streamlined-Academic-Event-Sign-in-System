@extends('layouts.app')
@section('content')
    <h1>My Events</h1>

    @foreach ($events as $event)
        <div>
            <h2>{{ $event->name }}</h2>
            <p>{{ $event->description }}</p>

            <form action="{{ route('events.show', $event->id) }}" method="GET">
                @csrf
                <button type="submit">Show</button>
            </form>

            <form action="{{ route('events.edit', $event->id) }}" method="GET">
                @csrf
                <button type="submit">Edit</button>
            </form>

            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach

    <div style="margin:  auto 0;">
    <a href="{{route('events.create')}}">Create new event boi</a>
    </div>
@endsection
