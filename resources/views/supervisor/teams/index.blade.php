@extends('supervisor.layout.master')

@section('title')
    Teams
@endsection

@section('container')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('supervisor.teams.create') }}">create</a>

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
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($teams as $key => $team)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $team->name }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('supervisor.teams.edit', $team->id) }}">Edit</a>

                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('supervisor.teams.delete', $team->id) }}"
                                                    onclick="return confirm('are you sure in delete')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center text-center">
                                {{ $teams->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
