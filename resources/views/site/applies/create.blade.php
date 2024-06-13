@extends('site.layout.main')

@section('title')
    Create Applies
@endsection

@section('section')
    <div class="container login-container ">
        <form action="{{ route('site.apply.store') }}" method="POST" class="form-control" enctype="multipart/form-data">
            @csrf
            <h2>Create</h2>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Supervisor:</label>
                    <select class="form-control" name="supervisor_id" id="supervisor_id">
                        <option>Select Supervisor</option>
                        @foreach ($supervisors as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                        @error('supervisor_id')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
                    </select>
                    <label for="email">Title:</label>
                    <input class="form-control" type="text" name="title" required autocomplete="off" />
                    @error('title')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                    <label for="email">Students:</label>
                    <select name="member_id[]" class="form-select" multiple>
                        <option>Select Students</option>
                        @foreach ($students as $row )
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    @error('title')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-6">
                    <label>teaching_assistants:</label>
                    <select class="form-control" name="teaching_assistants_id" id="teaching_assistants_id">
                        <option>Select teaching assistants</option>
                        @error('supervisor_id')
                            <h5 class="alert alert-danger">{{ $message }}</h5>
                        @enderror
                    </select>
                    <label for="email">Description:</label>
                    <input class="form-control" type="text" name="description" required autocomplete="off" />
                    @error('description')
                        <h5 class="alert alert-danger">{{ $message }}</h5>
                    @enderror

                </div>
                <div class="col-md-8 col-lg-2 text-center" style="padding-top: 8px">
                    <input type="submit" value="save" class="btn btn-primary form-control">
                </div>
            </div>
        </form>

    </div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {

        $('#supervisor_id').change(function() {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "{{ url('site/applys/teaching_assistants_ajax') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#teaching_assistants_id").find('option:not(:first)').remove();
                        if (data['newTeachingAssistants']) {
                            $.each(data['newTeachingAssistants'], function(key, value) {
                                $("#teaching_assistants_id").append("<option value=" + value[
                                        'id'] + ">" + value['name'] +
                                    "</option>");
                            });
                        }

                    }
                });
            } else {
                $('#teaching_assistants_id').empty();
            }
        });
    });
</script>
@endsection
