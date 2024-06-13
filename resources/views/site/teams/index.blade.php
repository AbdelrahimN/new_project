@extends('site.layout.main')
@section('title')
    Teams
@endsection

@section('section')
    <main>
        <div id="teams">
            @if (Session::has('join'))
                <h4 class="alert alert-success">{{ Session::get('join') }}</h4>
            @endif
            @if (!isset($student_team))
                <div class="p-2 mt-1 text-center">
                    <h2 class="" >Teams:</h2>
                </div>

                <div class="row">
                    @foreach ($team_members as $row)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <span class="">{{ $row->name }}</span>
                                </div>
                                <div class="card-body">
                                    @php
                                        $students = App\Models\Member::whereHas('team')
                                            ->whereHas('student')
                                            ->where('team_id', $row->id)
                                            ->get();
                                        $auth_id = App\Models\Member::whereHas('student')
                                            ->where('student_id', Auth::guard('student')->user()->id)
                                            ->first();
                                    @endphp
                                    @foreach ($students as $student)
                                        <h5 class="text-center" style="background-color: #ffffff">
                                            {{ $student->student->name }}</h5>
                                    @endforeach
                                    @if (!$auth_id)
                                        <a href="{{ route('site.team.join', $row->id) }}"
                                            class="btn btn-primary text-center">Join</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="teamsCards" class="row m-0 b-0 card-container py-2 my-1" style="z-index: 0"></div>
                <!-- No teams message -->
                <div id="noTeamsMessage" class="d-none">No Teams found.</div>
                <!-- create new team -->
                @php
                    $auth_id = App\Models\Member::whereHas('student')
                        ->where('student_id', Auth::guard('student')->user()->id)
                        ->first();
                @endphp
                @if (!$auth_id)
                        <div class="d-flex justify-content-center text-info">
                            <a href="{{ route('site.team.create') }}" style="margin-bottom: 6px" class="btn btn-primary">
                                create team
                            </a>
                        </div>
                @endif
            @else
                <h4 class="alert alert-success">The team is already there</h4>
            @endif
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
