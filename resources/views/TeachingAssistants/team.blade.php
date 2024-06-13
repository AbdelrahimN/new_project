@extends('TeachingAssistants.layout.master')

@section('title')
   Student Team
@endsection

@section('container')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($student_teams as $key => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->student->name }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <a href="{{ route('TeachingAssistants.student.team.project',$row->id) }}" class="btn btn-primary">Project</a>
                                            <a href="{{ route('TeachingAssistants.student.team.delete',$row->id) }}" class="btn btn-danger" onclick="return confirm('are you sure in delete')">Delete</a>
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
