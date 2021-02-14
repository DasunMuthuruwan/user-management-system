@extends('templates.main')
@section('content')
    <h1>Verify Email Address</h1>
    <p>You must verify your email address to access this page.</p>
    <form action="{{route('verification.send')}}" method="post">
        @csrf
        <input type="submit" value="Verify Eamil" class="btn btn-primary btn-sm">
    </form>
@endsection
