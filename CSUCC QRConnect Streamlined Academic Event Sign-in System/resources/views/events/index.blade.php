@extends('layouts.app')
<style>
    /* Adjust sidebar width and other styles as needed */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #343a40;
        padding: 20px;
    }

    .content {
        margin-left: 250px;
        /* Adjust to match sidebar width */
        padding: 20px;
    }
</style>
@section('content')
    @extends('layouts.bars')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card d-flex flex-column justify-content-center">
                    <div class="card-header text-center">
                        <h1 class="heading-1">My Events</h1>
                    </div>
                    <div class="card-footer d-flex justify-content-center align-items-center">
                        <form action="{{ route('events.create') }}" method="GET">
                            <button type="submit" class="btn btn-primary">Create new event</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <ol>
                            @forelse($events as $event)
                                <li class="my-5">
                                    <strong>Name:</strong> {{ $event->name }}<br>
                                    <strong>Start Date:</strong>
                                    {{ \Carbon\Carbon::parse($event->start_date_time)->format('Y-m-d H:i:s') }}<br>
                                    <strong>Status:</strong>
                                    @php
                                        $now = \Carbon\Carbon::now();
                                        $startDateTime = \Carbon\Carbon::parse($event->start_date_time);

                                        if ($startDateTime > $now) {
                                            echo 'Upcoming';
                                        } else {
                                            echo 'Started';
                                        }
                                    @endphp

                                    <br>
                                    <div class="container d-flex align-item-center justify-content-start">
                                        <a class="me-3 mt-1" href="{{ route('events.show', ['event' => $event->id]) }}">
                                            <button class="btn btn-primary">Show event</button>
                                        </a>
                                        <a class="me-3 mt-1" href="{{ route('events.edit', ['event' => $event->id]) }}">
                                            <button class="btn btn-primary">Edit event</button>
                                        </a>
                                        <form class="me-3 mt-1"
                                            action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary">Delete event</button>
                                        </form>
                                    </div>
                                </li>
                            @empty
                                <li>There are no events</li>
                            @endforelse
                            </ul>
                    </div>
                </div>

                @if ($events->count())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $events->links('pagination::bootstrap-5') }} <!-- Apply Bootstrap 4 pagination styling -->
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
