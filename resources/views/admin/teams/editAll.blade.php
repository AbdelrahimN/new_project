@extends('layout.master')

@section('title')
    Edit Team
@endsection
@section('container')
    <form action="{{ route('admin.teams.updateAll') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Student Count</label>
                <input type="text" name="stuednt_count"  placeholder="stuednt_count" class="form-control" autocomplete="off">
                @error('stuednt_count')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
