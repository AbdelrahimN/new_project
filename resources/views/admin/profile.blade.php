@extends('layout.master')
@section('title')
    Profile
@endsection
@section('container')
    <section>
        <div class="card mb-3" style="max-width: 700px;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">First Name : {{ $record->first_name }}</p>
                        <p class="card-text">Last Name : {{ $record->last_name }}</p>
                        <p class="card-text">Email : {{ $record->email }}</p>
                        <p class="card-text">Role : {{ $record->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
