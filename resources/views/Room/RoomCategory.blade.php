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
    <h2>Create Room Category</h2>
    <form action="/Room/createRoomCategory" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="room_category_name" id="room_category_name" placeholder="Room Category Name">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach($room_categories ?? '' as $room_category)
      <tr>
        <th scope="row">{{$room_category->room_category_id}}</th>
        <td>{{$room_category->room_category_name}}</td>
        <td>
            <a href="/Room/editRoomCategory/{{$room_category->room_category_id}}" class="btn btn-warning">Edit</a>
          </td>
        <td>
        <a href="/Room/removeRoomCategory/{{$room_category->room_category_id}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger">Remove</a>
          </td>
      </tr>
          @endforeach
    </tbody>
  </table>

@endsection
