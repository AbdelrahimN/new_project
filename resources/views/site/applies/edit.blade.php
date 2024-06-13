@extends('site.layout.main')

@section('title')
    Edit Applies
@endsection

@section('section')
    <div class="container login-container ">
        <form action="{{ route('site.apply.update',$record->id) }}" method="POST" class="form-control" enctype="multipart/form-data">
            @csrf
            <h2>Edit</h2>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label for="email">Title:</label>
                    <input class="form-control" type="text" name="title" value="{{ $record->title }}" required autocomplete="off" />
                    @error('title')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror

                </div>
                <div class="col-md-6 col-lg-6">
                    <label for="email">Description:</label>
                    <input class="form-control" type="text" name="description" value="{{ $record->description }}" required autocomplete="off" />
                    @error('description')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror


                </div>
                <div class="col-md-8 col-lg-2 text-center" style="padding-top: 8px">
                    <input type="submit" value="save" class="btn btn-primary form-control">
                </div>
            </div>
        </form>

    </div>
@endsection
