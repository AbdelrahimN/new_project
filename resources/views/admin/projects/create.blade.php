@extends('layout.master')

@section('title')
    Create Project
@endsection
@section('container')
    <form action="{{ route('admin.projects.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Center Name</label>
                <select class="form-control" name="center_id">
                    <option>Select Center</option>
                    @foreach ($centers as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                    @error('center_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                </select>

                <label>Title</label>
                <input type="text" name="title" placeholder="Title" class="form-control" autocomplete="off">
                @error('title')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>
            <div class="col-md-4 col-lg-6">
            <label>Supervisor Name</label>
                <select class="form-control" name="supervisor_id">
                    <option>Select Supervisor</option>
                    @foreach ($supervisors as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                    @error('supervisor_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                </select>
                <label>Description</label>
                <textarea name="description" placeholder="Description" class="form-control" autocomplete="off"></textarea>
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

