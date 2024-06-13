<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand ps-2" href="#">
            <div>
                <img class="logo-img navbar-brand image-fluid" src="{{ asset('site/images/logo2.png') }}" />
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">

                <li class="nav-item">
                    <a class="nav-link  text-white" href="{{ route('site.home') }}">Home</a>
                </li>
                @php
                    $project = null; // Initialize $project to avoid null error later
                    if (isset($student)) {
                        $project = App\Models\StudentProject::whereHas('student_team')
                            ->where('student_team_id', $student->id)
                            ->first();
                    }
                @endphp
                @if (!isset($project))
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{ route('site.apply') }}">Apply Project</a>
                    </li>
                @endif
                @php
                    $student = App\Models\Student_Team::whereHas('student')
                        ->where('student_id', Auth::guard('student')->user()->id)
                        ->first();
                @endphp
                @if (!isset($student))
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{ route('site.team.index') }}">Teams</a>
                    </li>
                @endif
                @php
                    $project = null; // Initialize $project to avoid null error later
                    if (isset($student)) {
                        $project = App\Models\StudentProject::whereHas('student_team')
                            ->where('student_team_id', $student->id)
                            ->first();
                    }
                @endphp
                @if (!isset($project))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.projects.index') }}">Projects</a>
                    </li>
                @endif
                @if (isset($project))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('site.tasks.index') }}">Tasks</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('site.profile') }}">Profile</a>
                </li>
                <li class="nav-item log-btn">
                    <a class="nav-link text-white" href="{{ route('site.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
