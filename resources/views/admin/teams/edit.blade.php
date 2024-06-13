@extends('layout.master')

@section('title')
    Edit Team
@endsection
@section('container')
    <form action="{{ route('admin.teams.update',$record->id) }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Name</label>
                <input type="text" name="name" value="{{ $record->name }}" placeholder="Name" class="form-control" autocomplete="off">
                @error('name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
            </div>
            <div class="col-md-6 col-lg-6">
                <label>Supervisors</label>
                <select class="form-control" name="supervisor_id" id="center_id">
                    <option>Select Supervisor</option>
                    @foreach ($supervisors as $row)
                        <option value="{{ $row->id }}" @if($record->supervisor_id == $row->id) selected @endif>{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
