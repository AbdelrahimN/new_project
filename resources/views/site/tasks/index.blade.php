@extends('site.layout.main')

@section('title')
    Tasks
@endsection
@section('section')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <a href="{{ route('site.tasks.create') }}" class="btn btn-primary">create</a>
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
                                    <th>Student Name</th>
                                    <th>Title</th>
                                    <th>Percentage Completed</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($tasks as $key => $task)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $task->student->name }}</td>
                                        <td>{{ $task->team->name }}</td>
                                        <td>{{ $task->percentage_completed }}%</td>
                                        <td>
                                            @if ($task->file != null)
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('site.tasks.download', $task->id) }}">file</a>
                                            @endif

                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('site.tasks.edit', $task->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm"
                                            onclick="return confirm('are you sure in delete')" href="{{ route('site.tasks.delete', $task->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
