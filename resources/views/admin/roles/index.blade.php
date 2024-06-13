@extends('layout.master')
@section('title')
    Roles
@endsection
@section('container')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            @if (auth()->user()->assignRole(Auth::user()->role))
                                @can('role_create')
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">create</a>
                                    </div>
                                @endcan
                            @endif
                        </div>
                        <br>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('role_show')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('admin.roles.show', $role->id) }}">Show</a>
                                                @endcan
                                            @endif
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('role_edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                                @endcan
                                            @endif
                                            @if ($role->name !== 'SuperAdmin')
                                                @if (auth()->user()->assignRole(Auth::user()->role))
                                                    @can('role_delete')
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('admin.roles.delete', $role->id) }}"
                                                            onclick="return confirm('are you sure in delete')">Delete</a>
                                                    @endcan
                                                @endif
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
