@extends('supervisor.layout.master')

@section('title')
    Projects
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
                                <a class="btn btn-primary" href="{{ route('supervisor.projects.create') }}">create</a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <form action="{{ route('supervisor.projects.change_status') }}" method="POST">
                        @csrf
                        <select name="status" id="" class="form-control">
                            <option>Select Projects Status</option>
                            <option value="0">Hiden</option>
                            <option value="1">Show</option>
                        </select>
                        <input type="submit" class="btn btn-info" name="" id="" value="change">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Center Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($projects as $key => $project)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $project->center->name }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>

                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('supervisor.projects.edit', $project->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('supervisor.projects.delete', $project->id) }}"
                                                onclick="return confirm('are you sure in delete')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
