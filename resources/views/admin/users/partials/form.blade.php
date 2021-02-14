@csrf
<div class="mb-3">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" name="fname" placeholder="Enter First Name" class="form-control form-control-sm @error('fname') is-invalid @enderror"
        value="{{ old('fname') }} @isset($user) {{ $user->fname }} @endisset">
        @error('fname')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
</div>
<div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" name="lname" placeholder="Enter Last Name" class="form-control form-control-sm @error('lname') is-invalid @enderror"
        value="{{ old('lname') }} @isset($user) {{ $user->lname }} @endisset">
        @error('lname')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" placeholder="Enter Email" class="form-control form-control-sm @error('email') is-invalid @enderror"
        value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
        @error('email')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
</div>
@isset($create)
<div class="mb-3">
    <label for="pwd" class="form-label">Password</label>
    <input type="password" name="password" placeholder="Enter password" class="form-control form-control-sm @error('password') is-invalid @enderror">
        @error('password')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
</div>
<div class="mb-3">
    <label for="pwd" class="form-label">Password Confirmation</label>
    <input type="password" name="password_confirmation" placeholder="Enter confirm password" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
            <span class="invalid-feedback">
                {{$message}}
            </span>
        @enderror
</div>
@endisset

<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" id="{{$role->id}}"
            @isset($user) @if(in_array($role->id,$user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label for="{{ $role->name }}" class="form-check-label">{{ $role->name }}</label>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary btn-sm">Submit</button>
