@extends('layouts.app')

@section('content')
    <form action="{{ route('attendees.store') }}" method="POST" enctype="multipart/form-data">
        {{-- ! //required to add cross site request forgery (@csrf directive) in every form to prevent csrf attacks --}}
        @csrf
        <div>
            <input type="text" name="fname" placeholder="First Name" value="">
            <input type="text" name="lname" placeholder="Last Name" value="">
        </div>

        <div>
            <input type="text" name="country" placeholder="Country" value="">
        </div>

        <div>
            <label for="bday">Birth Date</label>
            <input type="date" name="created" value="<?= date('Y-m-d') ?>" id="bday">
        </div>

        <div>
            <select name="occupational_status">
                <option value="employed">Employed</option>
                <option value="student">Student</option>
            </select>
        </div>

        <div>
            <input type="text" name="school_name" placeholder="School Name" value="">
        </div>

        <div>
            <input type="text" name="employer" placeholder="Employer" value="">
        </div>

        <div>
            <input type="email" name="email" placeholder="Email" value="">
        </div>

        <div>
            <label for="valid_id_image">Upload Valid ID for Attendee Verification</label>
            <input type="file" name="valid_id" id="valid_id_image">
        </div>


        <div>
            <input type="submit" name="submit">
        </div>
    </form>
@endsection
