@extends('site.layout.main')
@section('title')
    Create Team
@endsection

@section('section')
    <main>
        <div id="teams">
            <div class="row">
                <form action="{{ route('site.team.store') }}" method="POST" style="margin-bottom: 10px">
                    @csrf
                    <label for="">Teaching Assistant</label>
                    <select name="teaching_assistant_id" id="" class="form-control">
                        <option>Select Teaching Assistant</option>
                        @foreach ($Teaching_Assistant as $row )
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Team Name">
                    <input type="submit" value="save" class="btn btn-primary" style="margin-top: 6px">
                </form>
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
