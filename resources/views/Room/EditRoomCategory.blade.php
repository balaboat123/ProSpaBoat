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
    <h2>Edit Room Category</h2>
    <form action="/Room/updateRoomCategory/{{$room_category->room_category_id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="room_category_name" id="room_category_name" placeholder="Room Category Name" value="{{$room_category->room_category_name}}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
