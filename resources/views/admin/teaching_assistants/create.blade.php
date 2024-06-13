@extends('layout.master')

@section('title')
    Create TeachingAssistant
@endsection
@section('container')
    <form action="{{ route('admin.TeachingAssistants.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" autocomplete="off">
                @error('name')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Email</label>
                <input type="email" name="email" placeholder="email" class="form-control" autocomplete="off">
                @error('email')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Phone</label>
                <input type="text" name="phone" placeholder="Phone" class="form-control" autocomplete="off">
                @error('phone')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Supervisor</label>
                <select class="form-control" name="supervisor_id" id="supervisor_id">
                    <option>Select Supervisor</option>

                </select>
                    @error('supervisor_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror

            </div>
            <div class="col-md-4 col-lg-6">
                <label>UniversityID</label>
                <input type="text" name="university_id" placeholder="UniversityID" class="form-control"
                    autocomplete="off">
                    @error('university_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                <label>Password</label>
                <input type="password" name="password" placeholder="password" class="form-control" autocomplete="off">
                @error('password')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Centers</label>
            <select class="form-control" name="center_id" id="center_id">
                <option>Select Center</option>
                @foreach ($centers as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
                @error('center_id')
                    <h5 class="alert alert-danger">{{ $message }}</h5>
                @enderror
                <label>Role</label>
                <select class="form-control" name="role">
                    <option>Select Role</option>
                    @foreach ($roles as $row)
                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                    @error('role')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#center_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('admin/TeachingAssistants/supervisor_ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#supervisor_id").find('option:not(:first)').remove();
                        if (data['supervisors']) {
                            $.each(data['supervisors'], function(key, value) {
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
@endsection
