@extends('TeachingAssistants.layout.master')
@section('title')
    Student Team Project
@endsection
@section('style')
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .card h4 {
            margin-bottom: 15px;
        }

        .icon {
            color: #007bff;
        }

        .d-flex {
            display: flex;
            align-items: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
        }
    </style>
@endsection
@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Project</h5>
                    </div>
                    <div class="card-body">
                        <h4>Title: {{ $student_team_project->title }}</h4>
                        <h4>Description: {{ $student_team_project->description }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3">
                    <h5>Members</h5>
                </div>
                @foreach ($members as $row)
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-user mr-2 icon"></i>
                        <h5 class="mb-0">{{ $row->member->name }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
