@if(session('success'))
    <div class="alert alert-success text-center alert-dismissible col-md-4 offset-md-4" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
@endif

@if(session('error'))
<div class="alert alert-danger text-center alert-dismissible col-md-4 offset-md-4" role="alert">
    <strong>{{session('error')}}</strong>
</div>
@endif

@if(session('status'))
<div class="alert alert-danger text-center alert-dismissible col-md-4 offset-md-4" role="alert">
    <strong>{{session('status')}}</strong>
</div>
@endif
