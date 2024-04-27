@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Attendee First Name</th>
                <th>Attendee Last Name</th>
                <th>Check-in Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendees as $attendee)
                @foreach ($attendee->eventAttendees as $eventAttendee)
                    <tr>
                        <td>{{ $attendee->fname }}</td>
                        <td>{{ $attendee->lname }}</td>
                        <td>{{ $eventAttendee->checkin }}</td>
                        <td>
                            <form
                                action="{{ route('event-attendees.destroy', ['event_attendee' => $eventAttendee->id]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
    </table>

                @if (session()->has('error'))
                <div>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
@endsection
