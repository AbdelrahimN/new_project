@extends('layout.master')

@section('title')
    Edit Supervisor
@endsection
@section('container')
    <form action="{{ route('admin.supervisors.update',$record->id) }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Name</label>
                <input type="text" name="name" value="{{ $record->name }}" placeholder="Name" class="form-control" autocomplete="off">
                @error('name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Email</label>
                <input type="email" name="email" value="{{ $record->email }}" placeholder="email" class="form-control" autocomplete="off">
                @error('email')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $record->phone }}" placeholder="Phone" class="form-control" autocomplete="off">
                @error('email')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>UniversityID</label>
                <input type="text" name="university_id" value="{{ $record->university_id }}" placeholder="UniversityID" class="form-control"
                    autocomplete="off">
                    @error('university_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror

                <label>Centers</label>
            <select class="form-control" name="center_id">
                <option>Select Center</option>
                @foreach ($centers as $row)
                    <option value="{{ $row->id }}" @if($record->center_id == $row->id) selected @endif>{{ $row->name }}</option>
                @endforeach
            </select>
                @error('center_id')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
