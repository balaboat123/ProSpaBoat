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
    <h2>Edit Room</h2>
    <form action="/Room/updateRoom/{{$room->room_id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{$room->room_name}}" class="form-control" name="room_name" id="room_name" placeholder="Room Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="room_description" class="form-control" name="room_description" rows="5" cols="50">{{$room->room_description}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">จำนวนที่นั่ง</label>
            <input type="number" value="{{$room->room_seat}}" class="form-control" name="room_seat" id="room_seat" placeholder="Room Name">
        </div>
        <div class="form-group">
            <label for="category">ประเภท</label>
            <select name="room_category" id="room_category" class="form-control">
                @foreach($room_categories as $room_category)
                    <option value="{{$room_category->room_category_id}}">{{$room_category->room_category_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection
