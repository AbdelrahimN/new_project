@extends('supervisor.layout.master')

@section('title')
    Create Project
@endsection
@section('container')
    <form action="{{ route('supervisor.projects.requests.store') }}" method="POST" class="form-control" id="form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6" >
                <label>Supervisor Name</label>
                <select class="form-control" name="recipient_id" id="recipient_id">
                    <option>Select Supervisor</option>
                    @foreach ($supervisors as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                    @error('recipient_id')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                </select>
            </div>
            <div class="col-md-4 col-lg-6">
                <label>Project Name</label>
                <select class="form-control" name="project_id" id="project_id">
                    <option>Select Project</option>

                </select>

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

        $('#recipient_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('supervisor/projects/requests/ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#project_id").find('option:not(:first)').remove();
                        if (data['project']) {
                            $.each(data['project'], function(key, value) {
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
