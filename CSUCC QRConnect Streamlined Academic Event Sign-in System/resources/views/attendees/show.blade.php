@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 100%">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center text-capitalize">Attendee Information</h2>
                        <p class="card-text"><span class="fw-bold">Full Name:</span> {{ $new_attendee->fname }} {{ $new_attendee->lname }}</p>
                        <p class="card-text"><span class="fw-bold">Occupational Status:</span> {{ $new_attendee->occupational_status }}</p>
                        <p class="card-text"><span class="fw-bold">School Name: </span>{{ $new_attendee->school_name ?: 'N/A' }}</p>
                        <p class="card-text"><span class="fw-bold">Employer:</span> {{ $new_attendee->employer ?: 'N/A' }}</p>
                            <p class="card-text"><span class="fw-bold">Work Specialization:</span> {{ $new_attendee->work_specialization ?: 'N/A' }}</p>
                        <p class="card-text"><span class="fw-bold">Email:</span> {{ $new_attendee->email }}</p>
                        <div class="text-center">
                            <div>{{ $attendee_qrCode }}</div>
                            <div  class="alert alert-danger" role="alert">
                                Please take a <span class="fw-bold">SCREENSHOT</span> of the <span class="fw-bold">QR CODE</span> and <span class="fw-bold">PRESENT</span>  it to the event
                                organizer for <span class="fw-bold">ATTENDANCE</span>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
