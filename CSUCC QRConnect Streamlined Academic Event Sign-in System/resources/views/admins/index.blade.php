@extends('layouts.app')

@section('content')
    <form action="{{ route('auth.destroy') }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Logout</button>
    </form>
    <h2>
        WELCOME HANDSOME ADMIN {{ strtoupper(auth()->user()->fname) }} {{ strtoupper(auth()->user()->lname) }} YOU ARE
        LOGGED IN!
    </h2>
@endsection
