@extends('layouts.app')

@section('content')
    <!-- Main content section with attendance records -->
    <div class="container text-center">
        <div class="container-fluid">
            <!-- Bootstrap h2 title with event name -->
            <h2 class="text-center text-capitalizer mx-auto">{{ $event_name }} Attendance Records</h2>
        </div>
        <table class="table mx-auto mt-5" style="max-width: 100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Attendee First Name</th>
                    <th scope="col">Attendee Last Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Occupational Status</th>
                    <th scope="col">School Name</th>
                    <th scope="col">Employer</th>
                    <th scope="col">Work Specialization</th>
                    <th scope="col">Check-in Time</th>
                    <th scope="col">Check-out Time</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $attendeeNumber = 1;
                @endphp
                @foreach ($attendees as $attendee)
                    @foreach ($attendee->eventAttendees as $eventAttendee)
                        <tr>
                            <th scope="row">{{ $attendeeNumber++ }}</th>
                            <td>{{ $attendee->fname }}</td>
                            <td>{{ $attendee->lname }}</td>
                            <td>{{ $attendee->type }}</td>
                            <td>{{ $attendee->occupational_status }}</td>
                            <td>{{ $attendee->school_name ?: 'N/A' }}</td>
                            <td>{{ $attendee->employer ?: 'N/A' }}</td>
                            <td>{{ $attendee->work_specialization ?: 'N/A' }}</td>
                            <td>
                                {{ $eventAttendee->checkin ?: 'N/A' }}
                            </td>
                            <td>
                                {{ $eventAttendee->checkout ?: 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        @if (session()->has('error'))
            <div>
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
@endsection
