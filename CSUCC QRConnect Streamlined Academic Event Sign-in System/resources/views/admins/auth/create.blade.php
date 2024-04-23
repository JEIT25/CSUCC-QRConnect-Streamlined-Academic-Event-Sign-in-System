@extends('layouts.app')

@section('content')
    <form action="{{ route('auth.store') }}" method="POST">
        @csrf
        <input type="email" name="email" id="" placeholder="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <input type="password" name="password" id="" placeholder="password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </div>
        <div>
            <a href="{{route("forgot.password")}}">Forgot Password</a>
        </div>
        @if (session()->has('error'))
            <div>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <button type="submit">Submit</button>
    </form>
@endsection