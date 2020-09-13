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
    <h2>Create New Position</h2>
    <form action="/User/createEmployeePosition" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="emp_position_name" id="emp_position_name" placeholder="Position Name">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Position Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach($emp_positions ?? '' as $emp_position)
    <tr>
      <th scope="row">{{$emp_position->emp_position_id}}</th>
      <td>{{$emp_position->emp_position_name}}</td>
      <td>
          <a href="/User/editEmployeePosition/{{$emp_position->emp_position_id}}" class="btn btn-warning">Edit</a>
        </td>
      <td>
      <a href="/User/removeEmployeePosition/{{$emp_position->emp_position_id}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger">Remove</a>
        </td>
    </tr>
        @endforeach
    </tbody>
  </table>

@endsection
