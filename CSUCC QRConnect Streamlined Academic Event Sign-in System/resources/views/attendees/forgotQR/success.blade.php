@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center text-capitalize">Attendee Found</h2>
                        <h3 class="card-title text-center text-capitalize">Attendee Information</h3>
                        <p class="card-text"><span class="fw-bold">Full Name:</span> {{ $attendee->fname }}
                            {{ $attendee->lname }}</p>
                        <p class="card-text"><span class="fw-bold">Occupational Status:</span>
                            {{ $attendee->occupational_status }}</p>
                        <p class="card-text"><span class="fw-bold">School Name:
                            </span>{{ $attendee->school_name ?: 'N/A' }}</p>
                        <p class="card-text"><span class="fw-bold">Employer:</span> {{ $attendee->employer ?: 'N/A' }}
                        </p>
                        <p class="card-text"><span class="fw-bold">Work Specialization:</span>
                            {{ $attendee->work_specialization ?: 'N/A' }}</p>
                        <p class="card-text"><span class="fw-bold">Email:</span> {{ $attendee->email }}</p>
                        <div class="text-center">
                            <div>{{ $qrCode }}</div>
                            <div class="alert alert-danger" role="alert">
                                Please take a <span class="fw-bold">SCREENSHOT</span> of the <span class="fw-bold">QR
                                    CODE</span> and <span class="fw-bold">PRESENT</span> it to the event
                                organizer for <span class="fw-bold">ATTENDANCE</span>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
