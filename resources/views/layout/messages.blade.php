@if (Session::has('success'))
    <h5 class="alert alert-success">{{ Session::get('success') }}</h5>
@elseif(Session::has('update'))
    <h5 class="alert alert-success">{{ Session::get('update') }}</h5>
@elseif(Session::has('delete'))
    <h5 class="alert alert-danger">{{ Session::get('delete') }}</h5>
@endif
