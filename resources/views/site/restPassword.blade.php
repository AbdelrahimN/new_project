@extends('site.layout.main')
@section('title')
    Reset Password
@endsection

@section('section')
<form action="{{ route('site.profile.restPassword.change') }}" method="POST" class="form-control" id="form">
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-6" >
            <label>New Password</label>
            <input type="password" name="newPassword" placeholder="newPassword" class="form-control" autocomplete="off">
            @error('newPassword')
                <h5 class="alert alert-danger">{{ $message }}</h5>
            @enderror

        </div>
        <div class="col-md-4 col-lg-6">
            <label>Comfiarm Password</label>
            <input type="password" name="comfiarm_password" placeholder="comfiarm_password" class="form-control" autocomplete="off">
            @error('comfiarm_password')
                <h5 class="alert alert-danger">{{ $message }}</h5>
            @enderror
        </div>

    </div>
    <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
        <input type="submit" class="btn btn-primary" value="save">
    </div>
</form>
@endsection

