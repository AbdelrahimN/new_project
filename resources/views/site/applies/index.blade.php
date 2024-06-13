@extends('site.layout.main')

@section('title')
    Applies
@endsection

@section('section')
    <section>
        @include('layout.messages')
        <h4>Apply Project</h4>
        <div class="container login-container">

            <div class="container">
                <table class="table text-center">
                    <a href="{{ route('site.apply.create') }}" class="btn btn-primary">Create</a>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supervisor Name</th>
                            <th>Teaching Assistants Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody id="ideas-table-body">
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($applies as $row)
                        <tr>
                            <td>{{ $num }}</td>
                            <td>{{ $row->supervisor->name }}</td>
                            <td>{{ $row->teaching_assistants->name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->description }}</td>
                            @if($row->status == 0)
                                <td>Processing</td>
                            @elseif($row->status == 1)
                                <td>Approved</td>
                            @elseif($row->status == 2)
                                <td>Un Approved</td>
                            @endif
                            <td>
                                @if($row->status == 0)
                                    <a href="{{ route('site.apply.edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('site.apply.delete',$row->id) }}" class="btn btn-danger">Delete</a>
                                @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
