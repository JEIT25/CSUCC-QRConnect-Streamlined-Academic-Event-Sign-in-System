@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
<style>
    body {
        background-color: #132533 !important;
        background: url("{{ asset('assets/images/admin-bg.png') }}");
        background-size: 100vh;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@section('content')
@extends('layouts.bars')
@endsection
