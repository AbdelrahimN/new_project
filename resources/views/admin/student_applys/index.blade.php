@extends('layout.master')

@section('title')
    Student Applys
@endsection

@section('container')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">

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
                                    <th>Title</th>
                                    <th>Description </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($studentApplys as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->title }}</td>
                                        <td>{{ $user->description }}</td>
                                        <td>
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('user_delete')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('admin.studentApplys.show', $user->id) }}">Show</a>
                                                @endcan
                                            @endif




                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $studentApplys->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
