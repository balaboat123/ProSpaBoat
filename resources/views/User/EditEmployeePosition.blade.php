@extends('menu')
@section('body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="table-responsive my-2">
    <h2>Edit Position</h2>
    <form action="/User/updateEmployeePosition/{{$emp_position->emp_position_id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="emp_position_name" id="emp_position_name" placeholder="Position Name" value="{{$emp_position->emp_position_name}}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>


@endsection
