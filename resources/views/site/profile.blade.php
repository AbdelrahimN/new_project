@extends('site.layout.main')
@section('title')
    Profile
@endsection

@section('section')
    @if (Session::has('success'))
        <h4>{{ Session::get('success') }}</h4>
    @endif
    <h2>Profile</h2>

    <section class="row">
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 700px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('uploads/images/students/' . $record->image) }}" height="300px" width="300px"
                            style="margin-top: 20px" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Information</h5>
                            <p class="card-text">Center : {{ $record->center->name }}</p>
                            <p class="card-text">UniversityID : {{ $record->university_id }}</p>
                            <p class="card-text">Name : {{ $record->name }}</p>
                            <p class="card-text">Email : {{ $record->email }}</p>
                            <p class="card-text">Phone : {{ $record->phone }}</p>
                            <a href="{{ route('site.profile.restPassword') }}" class="btn btn-primary">resetPassword</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!$doc)
            <div class="col-md-6">
                <h3>Upload Document</h3>
                <p class="alert alert-info">The Document must be in PDF format</p>
                <form action="{{ route('site.profile.uploadDoc') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Document</label>
                        <input type="file" class="form-control"name="doc">
                        @error('doc')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        @else
            <div class="col-md-6">
                <h3>Upload Document Successfully</h3>

            </div>
        @endif

    </section>
    <hr>
    <section>
        <h2>Team</h2>
        <div class="container login-container">
            <div class="container">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Teaching Assistant</th>
                            <th>Name</th>

                        </tr>
                    </thead>
                    <tbody id="ideas-table-body">
                        @if ($team)
                            <tr>
                                <td>{{ $team->teaching_assistant->name }}</td>
                                <td>{{ $team->name }}</td>
                                @php
                                    $student_project = App\Models\StudentProject::whereHas('student_team')
                                        ->whereRelation(
                                            'student_team',
                                            'student_id',
                                            Auth::guard('student')->user()->id,
                                        )
                                        ->first();
                                @endphp
                                @if ($student_project)
                                    <td><a href="{{ route('site.profile.project', $team->id) }}"
                                            class="btn btn-primary">project</a></td>
                                @endif
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section>
        <h2>Skils</h2>
        <div class="container login-container">
            <a href="{{ route('site.skils.create') }}" class="btn btn-primary">create</a>
            <div class="container">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Skils Name</th>
                            <th>Skils Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ideas-table-body">
                        @foreach ($skils as $row)
                            <tr>
                                <td>{{ $row->skil->name }}</td>
                                <td>{{ $row->skil->description }}</td>
                                <td>
                                    <a href="{{ route('site.skils.edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('site.skils.delete',$row->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
