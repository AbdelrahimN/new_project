@extends('layout.master')
@section('title')
    Show Role
@endsection

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}">back</a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul id="treeview1">
                                <li>
                                    <ul>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <li>{{ $v->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
