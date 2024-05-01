@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table mx-auto mt-5" style="max-width: 50%">
            </thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Attendee First Name</th>
                <th scope="col">Attendee Last Name</th>
                <th scope="col">Check-in Time</th>
                <th scope="col">Check-out Time</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
                $attendeeNumber = 1;
            @endphp
            <tbody>
                @foreach ($attendees as $attendee)
                    @foreach ($attendee->eventAttendees as $eventAttendee)
            <tbody>
                <tr>
                    <th scope="row">{{ $attendeeNumber++ }}</th>
                    <td>{{ $attendee->fname }}</td>
                    <td>{{ $attendee->lname }}</td>
                    <td>{{ $eventAttendee->checkin }}</td>
                    <td>{{ $eventAttendee->checkout }}</td>
                    <td>
                        <form action="{{ route('event-attendees.destroy', ['event_attendee' => $eventAttendee->id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
            @endforeach
        </table>

        @if (session()->has('error'))
            <div>
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
@endsection
