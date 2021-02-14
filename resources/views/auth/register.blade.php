@extends('templates.main')
@section('content')
    <div class="card col-md-6 offset-md-3">
        <div class="card-header">
            <h4 class="text-info text-center">Register<h4>
        </div>
        <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="fname" placeholder="Enter First Name" class="form-control form-control-sm @error('fname') is-invalid @enderror" value="{{ old('fname') }}">
                            @error('fname')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="lname" placeholder="Enter Last Name" class="form-control form-control-sm @error('lname') is-invalid @enderror" value="{{ old('lname') }}">
                            @error('lname')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}">
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
                    <button type="submit" class="btn btn-primary btn-sm">Register User</button>
                  </form>
        </div>
    </div>
@endsection
