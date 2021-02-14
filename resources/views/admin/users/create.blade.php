@extends('templates.main')
@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-header">
            <h4 class="text-info text-center">Create New User<h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @include('admin.users.partials.form',['create' => true])
            </form>
        </div>
    </div>
@endsection
