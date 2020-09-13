<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\emp_position;


class EmployeePositionController extends Controller
{
    public function index()
    {
        return view('User.EmployeePositionForm')->with('emp_positions',emp_position::all());
    }

    public function create(Request $request)
    {
        $request->validate([
            'emp_position_name' => 'required|unique:emp_positions|max:100'
        ]);
        //insert
        $emp_position=new emp_position;
        $emp_position->emp_position_name = $request->emp_position_name;
        $emp_position->save();
        return redirect('/User/createEmployeePosition');
    }

    public function edit($emp_position_id)
    {
        $emp_position=emp_position::find($emp_position_id);
        return view('User.EditEmployeePosition',['emp_position'=>$emp_position]);
    }

    public function update(Request $request,$emp_position_id)
    {
        $request->validate([
            'emp_position_name' => 'required|unique:emp_positions|max:100'
        ]);

        $emp_position=emp_position::find($emp_position_id);
        $emp_position->emp_position_name=$request->emp_position_name;
        $emp_position->save();
        return redirect('/User/createEmployeePosition');
    }

    public function remove($emp_position_id)
    {
        emp_position::destroy($emp_position_id);
        return redirect('/User/createEmployeePosition');
    }
}
