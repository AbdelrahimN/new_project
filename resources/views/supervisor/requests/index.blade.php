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
                                <a class="btn btn-primary" href="{{ route('supervisor.projects.requests.create') }}">create</a>
                            </div>
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
                                    <th>Sender Name</th>
                                    <th>Recipient Name</th>
                                    <th>Project Name</th>
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
                                        <td>{{ $project->sender->name }}</td>
                                        <td>{{ $project->recipient->name }}</td>
                                        <td>{{ $project->project->title }}</td>
                                        <td>
                                            @if($project->recipient_id == Auth::guard('supervisor')->user()->id)
                                                <a href="{{ route('supervisor.projects.requests.approved',$project->id) }}" class="btn btn-info">Approved</a>
                                            @endif
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
