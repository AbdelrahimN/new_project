@extends('layout.master')

@section('title')
    Show Student Applys
@endsection

@section('container')
    @include('layout.messages')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card ">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <p>Sender:</p>
                            <div class="card mb-3 ">
                                <div class="row no-gutters">
                                    <div class="col-md-4 ">
                                        <img src="{{ asset('uploads/images/students/' . $record->student->image) }}" height="30px" width="500px"
                                            style="margin-top: 50px" class="img-fluid img-thumbnail">
                                    </div>
                                    <div class="col-md-8 ">
                                        <div class="card-body">
                                            <h5 class="card-title">Informations</h5>
                                            <p class="card-text">Name : {{ $record->student->name }}</p>
                                            <p class="card-text">Email : {{ $record->student->email }}</p>
                                            <p class="card-text">Phone : {{ $record->student->phone }}</p>
                                            <p class="card-text">UniversityID : {{ $record->student->university_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover text-center">
                            <p>Members:</a>

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($apply_members as $key => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->member->name }}</td>
                                        <td>{{ $row->member->email }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('admin.studentApplys.change_status',$record->id) }}" method="POST" class="form-control">
                            @csrf
                            <select name="status" class="form-control" id="">
                                <option value="">Select Status</option>
                                <option value="1">Approved</option>
                                <option value="2">Un Approved</option>
                            </select>
                            @error('status')
                                <h5 class="alert alert-danger">{{ $message }}</h5>
                            @enderror
                            <div class="row" style="margin-top: 8px;size: 25rem">
                                <input type="submit" value="change" class="btn btn-primary form-control">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
