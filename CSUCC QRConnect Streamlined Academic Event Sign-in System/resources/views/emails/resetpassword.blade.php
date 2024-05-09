@extends('layouts.app')

@section('content')
    <a href="{{ route('reset-password', $token) }}" class="btn btn-primary">Reset Password</a>
@endsection
