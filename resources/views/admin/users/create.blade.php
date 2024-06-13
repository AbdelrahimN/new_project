@extends('layout.master')

@section('title')
    Create User
@endsection
@section('container')
    <form action="{{ route('admin.users.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="first_name" class="form-control" autocomplete="off">
                @error('first_name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Email</label>
                <input type="email" name="email" placeholder="email" class="form-control" autocomplete="off">
                @error('email')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Role</label>
                <select class="form-control" name="role">
                    <option>Select Role</option>
                    @foreach ($roles as $row)
                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                    @error('role')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="last_name" class="form-control"
                    autocomplete="off">
                    @error('last_name')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                <label>Password</label>
                <input type="password" name="password" placeholder="password" class="form-control" autocomplete="off">
                @error('password')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
