@extends('site.layout.main')

@section('title')
    Create Tasks
@endsection
@section('section')
<form action="{{ route('site.tasks.store') }}" method="POST" class="form-control" id="form" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-6" >
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" autocomplete="off">
            @error('title')
                <h5 class="alert alert-danger">{{ $message }}</h5>
            @enderror
            <label>File(optional)</label>
            <input type="file" name="file" placeholder="file" class="form-control" autocomplete="off">
            @error('file')
                <h5 class="alert alert-danger">{{ $message }}</h5>
            @enderror
        </div>
        <div class="col-md-4 col-lg-6">
            <label>Percentage Completed</label>
            <select name="percentage_completed" class="form-control" autocomplete="off">
                <option>Select Percentage Completed</option>
                <option value="25">25%</option>
                <option value="50">50%</option>
                <option value="75">75%</option>
                <option value="100">100%</option>
            </select>
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