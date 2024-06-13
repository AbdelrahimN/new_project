@extends('layout.master')

@section('title')
    Create Center
@endsection
@section('container')
    <form action="{{ route('admin.centers.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" autocomplete="off">
                @error('name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Contact</label>
                <input type="text" name="contact" placeholder="contact" class="form-control" autocomplete="off">
                @error('contact')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>Location</label>
                <input type="text" name="location" placeholder="location" class="form-control"
                    autocomplete="off">
                    @error('location')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
