@extends('menu')
@section('body')
<h1>ห้องสปา</h1>
<a href="/Room/createRoom" class="btn btn-success">เพิ่มข้อมูลห้องสปา</a>
<a href="/Room/createRoomCategory" class="btn btn-success">เพิ่มประเภทห้องสปา</a>
<h2>รายการห้องสปา</h2>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Seat</th>
        <th scope="col">Category</th>
        <th scope="col">Edit</th>
        <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
        @foreach($rooms ?? '' as $room)
      <tr>
        <th scope="row">{{$room->room_id}}</th>
        <td>{{$room->room_name}}</td>
        <td>{{$room->room_description}}</td>
        <td>{{$room->room_seat}}</td>
        <td>
            {{$room->room_category}}
        </td>
        <td>
            <a href="/Room/editRoom/{{$room->room_id}}" class="btn btn-warning">Edit</a>
          </td>
        <td>
        <a href="/Room/removeRoom/{{$room->room_id}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger">Remove</a>
          </td>
      </tr>
          @endforeach
    </tbody>
  </table>

@endsection
