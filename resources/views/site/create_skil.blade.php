@extends('site.layout.main')
@section('title')
    Create Skils
@endsection

@section('section')
<form action="{{ route('site.skils.store') }}" method="POST" class="form-control" id="form">
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-6" >
            <label>Skils</label>
            <select name="skil_id[]" multiple placeholder="newPassword" class="form-control" autocomplete="off">
                <option>Select Skils</option>
                @foreach ($skils as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
            @error('newPassword')
                <h5 class="alert alert-danger">{{ $message }}</h5>
            @enderror

        </div>
    </div>
    <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
        <input type="submit" class="btn btn-primary" value="save">
    </div>
</form>
@endsection

