<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room_category;
use App\room;

class RoomController extends Controller
{
    public function index()
    {
        return view('Room.RoomDashboard')->with('room_categories',room_category::all())->with('rooms',room::all());
    }

    public function create(Request $request)
    {
        return view('Room.RoomForm')->with('room_categories',room_category::all());
    }

    public function insert(Request $request)
    {
        $request->validate([
            'room_name' => 'required',
            'room_description' => 'required',
            'room_seat' => 'required',
            'room_category' => 'required',
        ]);

        $room =new room;
        $room->room_name = $request->room_name;
        $room->room_description = $request->room_description;
        $room->room_seat = $request->room_seat;
        $room->room_category = $request->room_category;
        $room->save();
        return redirect('/Room/RoomDashboard');
    }

    public function edit($room_id)
    {
        $room=room::find($room_id);
        return view('Room.EditRoom',['room'=>$room])->with('room_categories',room_category::all());
    }

    public function update(Request $request,$room_id)
    {
        $request->validate([
            'room_name' => 'required',
            'room_description' => 'required',
            'room_seat' => 'required',
            'room_category' => 'required',
        ]);

        $room=room::find($room_id);
        $room->room_name = $request->room_name;
        $room->room_description = $request->room_description;
        $room->room_seat = $request->room_seat;
        $room->room_category = $request->room_category;
        $room->save();
        return redirect('/Room/RoomDashboard');
    }

    public function remove($room_id)
    {
        room::destroy($room_id);
        return redirect('/Room/RoomDashboard');
    }
}
