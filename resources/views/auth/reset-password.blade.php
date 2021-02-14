@extends('templates.main')
@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-header">
            <h4 class="text-info text-center">Reset Password<h4>
        </div>
        <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{$request->token}}">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ $request->email }}">
                            @error('email')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control form-control-sm @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password Confirm</label>
                        <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control form-control-sm">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
                  </form>
        </div>
    </div>
@endsection
