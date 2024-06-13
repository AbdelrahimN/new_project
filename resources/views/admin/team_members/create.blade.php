@extends('layout.master')

@section('title')
    Create TeamMember
@endsection
@section('container')
    <form action="{{ route('admin.team_members.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Center</label>
                <select class="form-control" name="center_id" id="center_id">
                    <option>Select Center</option>
                    @foreach ($centers as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                    @error('center_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                    <label>Team</label>
                    <select class="form-control" name="team_id" id="team_id">
                        <option>Select Team</option>
                    </select>
                        @error('team_id')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
            </div>
            <div class="col-md-4 col-lg-6">
                <label>Supervisor</label>
                <select class="form-control" name="supervisor_id" id="supervisor_id">
                    <option>Select Supervisor</option>
                </select>
                    @error('supervisor_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                    <label>Project</label>
                    <select class="form-control" name="project_id" id="project_id">
                        <option>Select Project</option>
                    </select>
                        @error('project_id')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror

            </div>

        </div>
        <div class="col-md-6 col-lg-12 text-md-nowrap" style="padding-top: 8px">
            <input type="submit" class="btn btn-primary" value="save">
        </div>
    </form>
@endsection
@section('script')

<script>
    $(document).ready(function(e) {

        $('#center_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('admin/team_members/supervisor_ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#supervisor_id").find('option:not(:first)').remove();
                        if (data['newSupervisor']) {
                            $.each(data['newSupervisor'], function(key, value) {
                                $("#supervisor_id").append("<option value=" + value[
                                        'id'] + ">" + value['name'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#supervisor_id').empty();
            }
        });
    });
</script>
<script>
    $(document).ready(function(e) {

        $('#supervisor_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('admin/team_members/team_ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#team_id").find('option:not(:first)').remove();
                        if (data['newTeam']) {
                            $.each(data['newTeam'], function(key, value) {
                                $("#team_id").append("<option value=" + value[
                                        'id'] + ">" + value['name'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#team_id').empty();
            }
        });
    });
</script>
<script>
    $(document).ready(function(e) {

        $('#team_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('admin/team_members/project_ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#project_id").find('option:not(:first)').remove();
                        if (data['newProject']) {
                            $.each(data['newProject'], function(key, value) {
                                $("#project_id").append("<option value=" + value[
                                        'id'] + ">" + value['title'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#project_id').empty();
            }
        });
    });
</script>
@endsection
