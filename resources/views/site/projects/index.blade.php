@extends('site.layout.main')
@section('title')
    Teams
@endsection

@section('section')
    <main>
        <div id="teams">
            @php
                $student_project = App\Models\StudentProject::whereHas('student_team')
                    ->whereRelation('student_team', 'student_id', Auth::guard('student')->user()->id)
                    ->first();
            @endphp
            @if(!$student_project)
            <div class="p-2 mt-1 text-center">
                <h2 class="" >Projects:</h2>
            </div>
            <div class="row">
                @foreach ($projects as $row)
                    @php
                        $team_members = App\Models\Team_Member::whereHas('project')
                            ->where('project_id', $row->id)
                            ->first();
                        $student_project = App\Models\StudentProject::whereHas('student_team')
                            ->whereRelation('student_team', 'student_id', Auth::guard('student')->user()->id)
                            ->first();
                    @endphp
                    @if (!$team_members)
                        <div class="col-md-3">
                            <div class="card" style="margin-bottom: 10px">
                                <div class="card-header d-flex justify-content-between">
                                    <span class="">Supervisor Name : {{ $row->supervisor->name }}</span>
                                </div>
                                <div class="card-body">
                                    <h4>{{ $row->title }}</h4>
                                    <h4>{{ $row->description }}</h4>

                                </div>
                                @if (!$student_project)
                                    <a href="{{ route('site.projects.join', $row->id) }}" class="btn btn-primary">Join</a>
                                @endif

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @else
            <h4>The project is already there</h4>
            @endif


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
