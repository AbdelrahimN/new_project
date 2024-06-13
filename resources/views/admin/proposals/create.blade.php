@extends('layout.master')

@section('title')
    Create Proposal
@endsection
@section('container')
    <form action="{{ route('admin.proposals.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Center Name</label>
                <select class="form-control" name="project_id">
                    <option>Select Project</option>
                    @foreach ($projects as $row)
                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                    @endforeach
                    @error('project_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                </select>
                <label>Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control" autocomplete="off">
                @error('description')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>Title</label>
                <input type="text" name="title" placeholder="Title" class="form-control" autocomplete="off">
                @error('title')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror

            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
