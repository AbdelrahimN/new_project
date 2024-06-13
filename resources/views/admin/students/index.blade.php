@extends('layout.master')

@section('title')
    Students
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
                                        <a class="btn btn-primary" href="{{ route('admin.students.create') }}">create</a>
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
                                    <th>Center Name</th>
                                    <th>UniversityID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($students as $key => $student)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $student->center->name }}</td>
                                        <td>{{ $student->university_id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td><img src="{{ asset('uploads/images/students/'.$student->image) }}" width="150px" class="rounded mx-auto d-block"></td>
                                        <td>
                                            @php
                                                $doc = App\Models\StudentDocument::whereHas('student')->where('student_id',$student->id)->first();
                                            @endphp
                                            @if($doc)
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                            @can('user_edit')
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.students.downloadPDF', $student->id) }}">Download</a>
                                            @endcan
                                        @endif
                                            @endif
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('user_edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('admin.students.edit', $student->id) }}">Edit</a>
                                                @endcan
                                            @endif
                                            @if (auth()->user()->assignRole(Auth::user()->role))
                                                @can('user_delete')
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('admin.students.delete', $student->id) }}"
                                                        onclick="return confirm('are you sure in delete')">Delete</a>
                                                @endcan
                                            @endif




                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection
