@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Attendee Information</h2>
                        <p class="card-text">Full Name: {{ $new_attendee->fname }} {{ $new_attendee->lname }}</p>
                        <p class="card-text">Occupational Status: {{ $new_attendee->occupational_status }}</p>
                        <p class="card-text">School Name: {{ $new_attendee->school_name ?: 'N/A' }}</p>
                        <p class="card-text">Employer: {{ $new_attendee->employer ?: 'N/A' }}</p>
                            <p class="card-text">Employer: {{ $new_attendee->work_specialization ?: 'N/A' }}</p>
                        <p class="card-text">Email: {{ $new_attendee->email }}</p>
                        <div class="text-center">
                            <div>{{ $attendee_qrCode }}</div>
                            <div  class="alert alert-secondary" role="alert">
                                Please take a screenshot of the QR code and present it to the event
                                organizer for attendance.
                            </div>
                            {{-- <small class="text-muted">Please take a screenshot of the QR code and present it to the event
                                organizer for attedance.</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
