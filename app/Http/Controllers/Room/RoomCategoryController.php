<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\room_category;

class RoomCategoryController extends Controller
{
    public function index()
    {
        return view('Room.RoomCategory')->with('room_categories',room_category::all());
    }

    public function create(Request $request)
    {

        // dd($request->spa_category_name);
        $request->validate([
            'room_category_name' => 'required|unique:room_categories|max:100'
        ]);
        //insert
        $room_category=new room_category;
        $room_category->room_category_name = $request->room_category_name;
        $room_category->save();
        return redirect('/Room/createRoomCategory');
    }

    public function edit($room_category_id)
    {
        $room_category=room_category::find($room_category_id);
        return view('Room.EditRoomCategory',['room_category'=>$room_category]);
    }

    public function update(Request $request,$room_category_id)
    {
        $request->validate([
            'room_category_name' => 'required|unique:room_categories|max:100'
        ]);

        $room_category=room_category::find($room_category_id);
        $room_category->room_category_name=$request->room_category_name;
        $room_category->save();
        return redirect('/Room/createRoomCategory');
    }

    public function remove($room_category_id)
    {
        room_category::destroy($room_category_id);
        return redirect('/Room/createRoomCategory');
    }

}
