@extends('layout.master')

@section('title')
    Create Skil
@endsection
@section('container')
    <form action="{{ route('admin.skils.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" autocomplete="off">
                @error('name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>Description</label>
                <input type="text" name="description" placeholder="description" class="form-control"
                    autocomplete="off">
                    @error('description')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
