@extends('layout.master')

@section('title')
    Edit Role
@endsection

@section('container')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.roles.update', $role->id) }}" class="form-control" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="form-group">
                                <p>role</p>
                                <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-4">
                                <label for="permission">permission</label>
                                <select class="form-control select2bs4" name="permission[]" multiple>
                                    @foreach ($permission as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <input type="submit" value="update" class="btn btn-primary">
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </form>
@endsection
