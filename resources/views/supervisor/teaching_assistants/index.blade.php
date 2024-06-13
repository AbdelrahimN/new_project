@extends('supervisor.layout.master')

@section('title')
    TeachingAssistants
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
                                    <th>Center Name</th>
                                    <th>UniversityID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($TeachingAssistants as $key => $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->center->name }}</td>
                                        <td>{{ $row->university_id }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center text-center">
                            {{ $TeachingAssistants->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
   </div>
</div>
@endsection
