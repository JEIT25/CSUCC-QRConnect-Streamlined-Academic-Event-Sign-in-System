@extends('layouts.app')

@section('content')
<div class="text-center mt-4">
    <h1>Generate QR Code</h1>
    <h5>Please fill-in the required information</h5>
</div>
    <form id="myForm" action="{{ route('attendees.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto mt-3" style="max-width: 50%">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf

        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                value="{{ old('fname') }}">
            @error('fname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name"
                value="{{ old('lname') }}">
            @error('lname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Country"
                value="{{ old('country') }}">
            @error('country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bday" class="form-label">Birth Date</label>
            <input type="date" class="form-control" id="bday" name="birth_date"
                value="{{ old('birth_date', date('Y-m-d')) }}">
            @error('birth_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="occupational_status" class="form-label">Occupational Status</label>
            <select class="form-select" id="occupational_status" name="occupational_status">
                <option value="student" {{ old('occupational_status') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="employed" {{ old('occupational_status') == 'employed' ? 'selected' : '' }}>Employed</option>
            </select>
            @error('occupational_status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="guestRadio" value="guest"
                    {{ old('type') == 'guest' ? 'checked' : '' }}>
                <label class="form-check-label" for="guestRadio">Guest</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="csuccMemberRadio" value="csucc member"
                    {{ old('type') == 'csucc member' ? 'checked' : '' }}>
                <label class="form-check-label" for="csuccMemberRadio">CSUCC Member</label>
            </div>
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div id="schoolField-cont" style="display: none;">
            <div class="mb-3">
                <label for="schoolField" class="form-label">School Name</label>
                <input type="text" class="form-control" id="schoolField" name="school_name" placeholder="School Name"
                    value="{{ old('school_name') }}">
                @error('school_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div id="employerField-cont" style="display: none;">
            <div class="mb-3">
                <label for="employerField" class="form-label">Employer</label>
                <input type="text" class="form-control" id="employerField" name="employer" placeholder="Employer"
                    value="{{ old('employer') }}">
                @error('employer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div id="work_specialization_cont" style="display: none;">
            <div class="mb-3">
                <label for="work_specialization" class="form-label">Work Specialization</label>
                <select class="form-select" id="work_specialization" name="work_specialization[]"
                    onchange="showSpecifyInput(this)">
                    <option value="teacher" {{ old('work_specialization') == 'teacher' ? 'selected' : '' }}>Teacher
                    </option>
                    <option value="office-admin" {{ old('work_specialization') == 'office-admin' ? 'selected' : '' }}>
                        Office Admin</option>
                    <option value="others" {{ old('work_specialization') == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('work_specialization')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div id="specifyInput" style="display: none;">
                <div class="mb-3">
                    <label for="otherSpec" class="form-label">Specify</label>
                    <input type="text" class="form-control" id="otherSpec" name="work_specialization[]">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="valid_id_image" class="form-label">Upload Valid ID for Attendee Verification</label>
            <input type="file" class="form-control" id="valid_id_image" name="valid_id">
            @error('valid_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @if (session()->has('invalid_id'))
                <div>
                    <p class="text-danger">{{ session('invalid_id') }}</p>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit" id="submitBtn">Submit</button>
        </div>
    </form>
    <!-- Include individual JavaScript files -->
    @push('scripts')
        <script src="{{ asset('assets/js/attendees/create.js') }}"></script>
    @endpush
@endsection
