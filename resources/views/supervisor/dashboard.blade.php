@extends('supervisor.layout.master')
@section('title')
    Dashboard
@endsection
@section('container')
    <div class="row">

        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Teams</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ App\Models\Team::count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-users-cog"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Projects</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ App\Models\Project::count() }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="fas fa-tasks"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Students</h6>

                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Center Name</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Image</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($students as $row)
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $row->center->name }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td><img src="{{ asset('uploads/images/students/' . $row->image) }}" width="150px"
                                                class="rounded mx-auto d-block"></td>
                                        @php
                                            $doc = App\Models\StudentDocument::whereHas('student')
                                                ->where('student_id', $row->id)
                                                ->first();
                                        @endphp
                                        @if ($doc)
                                            <td><a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.students.downloadPDF', $row->id) }}">Download</a></td>
                                        @endif
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
