@extends('layouts.app')

@section('content')
    <h2>{{ $new_attendee->fname }} {{ $new_attendee->lname }}</h2>
    <h2>{{ $new_attendee->country }}</h2>
    <h2>{{ $new_attendee->occupational_status }}</h2>
    <h2>{{ $new_attendee->school_name }}</h2>
    <h2>{{ $new_attendee->employer }}</h2>
    <h2>{{ $new_attendee->email }}</h2>
    <div>{{ $attendee_qrCode }}</div>
@endsection
