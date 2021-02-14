@extends('templates.main')
@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-header">
            <h4 class="text-info text-center">Edit User<h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                @method('PATCH')
                @include('admin.users.partials.form')
            </form>
        </div>
    </div>
@endsection
