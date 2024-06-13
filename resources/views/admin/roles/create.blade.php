@extends('layout.master')
@section('title')
    Create Role
@endsection

@section('container')
    <form action="{{ route('admin.roles.store') }}" method="POST" class="form-control">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control"
                                        name="name" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="permission">Permission</label>
                                <select class="form-select form-select-lg mb-3"
                                    name="permission[]" multiple>
                                    @foreach ($permission as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            <div
                                class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <input type="submit" value="Save"
                                    class="btn btn-primary"></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
