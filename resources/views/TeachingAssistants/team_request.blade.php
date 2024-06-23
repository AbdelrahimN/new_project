@extends('TeachingAssistants.layout.master')

@section('title')
    Team Request
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
                                    <th>Team Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($teams as $key => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->student_team->name }}</td>
                                        <td>
                                            @php
                                                $project = App\Models\StudentProject::whereHas('student_team')
                                                    ->where('student_team_id', $row->student_team->id)
                                                    ->first();
                                            @endphp
                                            @if (isset($project))
                                                <a href="{{ route('TeachingAssistants.team.request.project', $row->student_team->id) }}"
                                                    class="btn btn-primary">Project</a>
                                            @endif

                                            <a href="{{ route('TeachingAssistants.team.request.delete', $row->student_team->id) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('are you sure in delete')">Delete</a>

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
