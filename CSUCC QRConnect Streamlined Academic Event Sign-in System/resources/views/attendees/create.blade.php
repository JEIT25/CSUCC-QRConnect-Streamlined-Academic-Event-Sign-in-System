@extends('layouts.app')

@section('content')
    <form id="myForm" action="{{ route('attendees.store') }}" method="POST" enctype="multipart/form-data">
        {{-- Add cross-site request forgery (CSRF) token --}}
        @csrf

        <div>
            <input type="text" name="fname" placeholder="First Name" value="{{ old('fname') }}">
            @error('fname')
                <div>{{ $message }}</div>
            @enderror
            <input type="text" name="lname" placeholder="Last Name" value="{{ old('lname') }}">
            @error('lname')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="text" name="country" placeholder="Country" value="{{ old('country') }}">
            @error('country')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="bday">Birth Date</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', date('Y-m-d')) }}" id="bday">
            @error('birth_date')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <select name="occupational_status" id="occupational_status">
                <option value="employed" {{ old('occupational_status') == 'employed' ? 'selected' : '' }}>Employed</option>
                <option value="student" {{ old('occupational_status') == 'student' ? 'selected' : '' }}>Student</option>
            </select>
            @error('occupational_status')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>
                <input type="radio" name="type" value="guest" id="guestRadio"
                    {{ old('type') == 'guest' ? 'checked' : '' }}> Guest
            </label>
            <label>
                <input type="radio" name="type" value="csucc member" id="csuccMemberRadio"
                    {{ old('type') == 'csucc member' ? 'checked' : '' }}> CSUCC Member
            </label>
            @error('type')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="text" name="school_name" placeholder="School Name" value="{{ old('school_name') }}"
                id="schoolField">
            @error('school_name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="text" name="employer" placeholder="Employer" value="{{ old('employer') }}" id="employerField">
            @error('employer')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div id="work_specialization">
            <label for="specialization">Work Specialization:</label>
            <select name="work_specialization" id="specialization" onchange="showSpecifyInput(this)">
                <option value="teacher" {{ old('work_specialization') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <option value="office-admin" {{ old('work_specialization') == 'office-admin' ? 'selected' : '' }}>Office
                    Admin</option>
                <option value="others" {{ old('work_specialization') == 'others' ? 'selected' : '' }}>Others</option>
            </select>
            <div id="specifyInput" style="display: none;">
                <label for="otherSpec">Specify:</label>
                <input type="text" id="otherSpec" name="work_specialization" value="{{ old('work_specialization') }}">
            </div>
            @error('work_specialization')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="valid_id_image">Upload Valid ID for Attendee Verification</label>
            <input type="file" name="valid_id" id="valid_id_image">
            @error('valid_id')
                <div>{{ $message }}</div>
            @enderror
            @if (session()->has('invalid_id'))
                <div>
                    <p>{{ session('invalid_id') }}</p>
                </div>
            @endif
        </div>

        <div>
            <input type="submit" name="submit" id="submitBtn">
        </div>
    </form>
    <!-- Include individual JavaScript files -->
    @push('scripts')
        <script src="{{ asset('assets/js/attendees/create.js') }}"></script>
    @endpush
@endsection
