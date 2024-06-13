@extends('TeachingAssistants.layout.master')
@section('title')
    Profile
@endsection
@section('container')
    <section>
        <div class="card mb-3" style="max-width: 700px;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">Center Name : {{ $record->center->name }}</p>
                        <p class="card-text">university_id : {{ $record->university_id }}</p>
                        <p class="card-text">Name : {{ $record->name }}</p>
                        <p class="card-text">Email : {{ $record->email }}</p>
                        <p class="card-text">Phone : {{ $record->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
