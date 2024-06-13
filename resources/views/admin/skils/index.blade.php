@extends('layout.master')

@section('title')
    Skils
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
                                @can('user_create')
                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('admin.skils.create') }}">create</a>
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
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($skils as $key => $skil)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $skil->name }}</td>
                                        <td>{{ $skil->description }}</td>
                                        <td>
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('user_edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.skils.edit', $skil->id) }}">Edit</a>
                                                @endcan
                                            @endif
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('user_delete')
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.skils.delete', $skil->id) }}"
                                                        onclick="return confirm('are you sure in delete')">Delete</a>
                                                @endcan
                                            @endif




                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $skils->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection
