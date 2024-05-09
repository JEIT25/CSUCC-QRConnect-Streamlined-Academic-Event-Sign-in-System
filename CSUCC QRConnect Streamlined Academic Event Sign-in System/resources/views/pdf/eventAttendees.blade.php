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
                    <th scope="col" style="font-size: 13px;">No.</th>
                    <th scope="col" style="font-size: 13px;">Attendee First Name</th>
                    <th scope="col" style="font-size: 13px;">Attendee Last Name</th>
                    <th scope="col" style="font-size: 13px;">Type</th>
                    <th scope="col" style="font-size: 13px;">Occupational Status</th>
                    <th scope="col" style="font-size: 13px;">School Name</th>
                    <th scope="col" style="font-size: 13px;">Employer</th>
                    <th scope="col" style="font-size: 13px;">Work Specialization</th>
                    <th scope="col" style="font-size: 13px;">Check-in Time</th>
                    <th scope="col" style="font-size: 13px;">Check-out Time</th>
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
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->fname }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->lname }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->type }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->occupational_status }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->school_name ?: 'N/A' }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->employer ?: 'N/A' }}</td>
                            <td class="text-capitalize" style="font-size: 13px;">{{ $attendee->work_specialization ?: 'N/A' }}</td>
                            <td style="font-size: 13px;">
                                {{ $eventAttendee->checkin ?: 'N/A' }}
                            </td>
                            <td style="font-size: 13px;">
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
