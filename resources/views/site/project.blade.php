@extends('site.layout.main')
@section('title')
    Teams
@endsection

@section('section')
    <main>
        <div id="teams">
            @if(Session::has('error'))
                <h5>{{ Session::get('error') }}</h5>
            @endif
            <div class="row ">
                <div class="col-md-3">
                    <div class="card " style="margin-bottom: 10px">
                        <div class="card-header d-flex justify-content-between">
                            <span class="">Project</span>
                        </div>
                        <div class="card-body">
                            <h4>Title : {{ $project->title }}</h4>
                            <h4>Description : {{ $project->description }}</h4>
                            <p>Members:</p>
                            @foreach ($student_team_member as $row)
                                <h5>{{ $row->member->name }}</h5>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>


    </main>
@endsection
@section('script')
    <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        BackToTop = () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        };
    </script>
    <script src="{{ asset('site/js/teams.j') }}"></script>
@endsection
