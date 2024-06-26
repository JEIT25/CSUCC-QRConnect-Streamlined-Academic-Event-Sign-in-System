@extends('layouts.app')

@section('content')
@extends('layouts.bars')
    <div class="container">
        <div class="table-responsive">
            <h2 class="text-center mt-5 heading-2">Attendee Records</h2>
            <table class="table mx-auto mt-5">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Attendee First Name</th>
                        <th scope="col">Attendee Last Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Occupational Status</th>
                        <th scope="col">School</th>
                        <th scope="col">Employer</th>
                        <th scope="col">Work Specialization</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Action</th>
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
                                <td class="text-capitalize">{{ $attendee->fname }}</td>
                                <td class="text-capitalize">{{ $attendee->lname }}</td>
                                <td class="text-capitalize">{{ $attendee->type }}</td>
                                <td class="text-capitalize">{{ $attendee->occupational_status }}</td>
                                <td class="text-capitalize">{{ $attendee->school_name ?? 'N/A' }}</td>
                                <td class="text-capitalize">{{ $attendee->employer ?? 'N/A' }}</td>
                                <td class="text-capitalize">{{ $attendee->work_specialization ?? 'N/A' }}</td>
                                <td>
                                    {{-- format datetime to include AM OR PM else N/A --}}
                                    {{ $eventAttendee->checkin ? \Carbon\Carbon::parse($eventAttendee->checkin)->format('Y-m-d h:i:s A') : 'N/A' }}
                                </td>
                                <td>
                                    {{ $eventAttendee->checkout ? \Carbon\Carbon::parse($eventAttendee->checkout)->format('Y-m-d h:i:s A') : 'N/A' }}
                                </td>
                                <td>
                                    <form
                                        action="{{ route('event-attendees.destroy', ['event_attendee' => $eventAttendee->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (session()->has('error'))
            <div>
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
@endsection
