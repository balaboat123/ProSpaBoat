<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\employee;
use App\emp_position;
use App\employee_phone;
use App\employee_day;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = DB::table('employees')
        ->paginate(3);
        return view('User.EmployeeDashboard')
        ->with('employees',$employee)
        ->with('emp_positions',emp_position::all());
    }

    public function create()
    {
        $list=DB::table('province')->get();
        return view('User.EmployeeForm')
        ->with('emp_positions',emp_position::all())
        ->with('list',$list);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'emp_prefix',
            'emp_firstname' => 'required',
            'emp_lastname' => 'required',
            'emp_email' ,
            'emp_gender',
            'emp_image' ,
            'emp_bdate' ,
            'emp_position' ,
            'emp_id_card' ,
            'emp_nationality',
            'emp_religion' ,
            'emp_province' ,
            'emp_amphur' ,
            'emp_district' ,
            'emp_postcode' ,
            'emp_address',
            'emp_salary' ,
            'emp_username' ,
            'emp_password' ,
            'emp_phone_number.*' => 'required',
            ]);

        $id_gen= DB::table('employees')->max('emp_id');

            if($id_gen == null){
            $emp_idgen = "EMP-000";
            }

            else if($id_gen != null){
                $substr = substr($id_gen,-3)+1;
                if($substr<10){
                    $emp_idgen="EMP".'-'."00".$substr;
                }
                elseif($substr >= 10 && $substr<=99){
                    $emp_idgen="EMP".'-'."0".$substr;
                }
                elseif($substr <=100){
                    $emp_idgen="EMP".'-'.$substr;
                }
            }
        $Format=base64_encode('_'.time());
        $image=$request->file('emp_image')->getClientOriginalExtension();
        $imageFormat=$Format.".".$image;
        $imageData = File::get($request->emp_image);
        Storage::disk('local')->put('public/employee_image/'.$imageFormat,$imageData);

        $employee =new employee;
        $employee->emp_id = $emp_idgen;
        $employee->emp_prefix = $request->emp_prefix;
        $employee->emp_firstname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_email = $request->emp_email;
        $employee->emp_gender = $request->emp_gender;
        $employee->emp_image = $imageFormat;
        $employee->emp_bdate = $request->emp_bdate;
        $employee->emp_id_position = $request->emp_position;
        $employee->emp_id_card = $request->emp_id_card;
        $employee->emp_nationality = $request->emp_nationality;
        $employee->emp_religion = $request->emp_religion;
        $employee->emp_province = $request->emp_province;
        $employee->emp_amphur = $request->emp_amphur;
        $employee->emp_district = $request->emp_district;
        $employee->emp_postcode = $request->emp_postcode;
        $employee->emp_address = $request->emp_address;
        $employee->emp_salary = $request->emp_salary;
        $employee->emp_username = $request->emp_username;
        $employee->emp_password = $request->emp_password;
        $employee->save();


            foreach($request['emp_phone_number'] as $item => $value){
                $array_phone = array(
                    'id_emp' => $emp_idgen,
                    'emp_phone_number' => $request['emp_phone_number'][$item],
                );
                employee_phone::create($array_phone);
            }
            foreach($request['emp_day'] as $item => $value){
                $array_day = array(
                    'id_empday' => $emp_idgen,
                    'emp_day' => $request['emp_day'][$item],
                );
                employee_day::create($array_day);
            }
            // dd($array_day,$array_phone);
        return redirect('/User/EmployeeDashboard');
    }

    public function edit($emp_id)
    {
        $employee=employee::find($emp_id);

        $employee_phones=DB::table('employee_phones')->get();
        $employee_days=DB::table('employee_days')->get();

        $list_province=DB::table('province')->get();
        $list_amphur=DB::table('amphur')->get();
        $list_district=DB::table('district')->get();

        return view('User.EditEmployee',['employee'=>$employee])
        ->with('emp_positions',emp_position::all())
        ->with('list_province',$list_province)
        ->with('list_amphur',$list_amphur)
        ->with('list_district',$list_district)
        ->with('employee_phones',$employee_phones)
        ->with('employee_days',$employee_days);
    }

    public function update(Request $request, $emp_id)
    {


        $emp_phone = DB::table('employee_phones')
        ->join('employees','employee_phones.id_emp','=','employees.emp_id')
        ->select('employee_phones.id_emp')
        ->where('employee_phones.id_emp','=',$emp_id)
        ->groupBy('employee_phones.id_emp')
        ->get();

        $array_phone= json_decode( json_encode($emp_phone), true);

        if($array_phone != []){
            employee_phone::destroy([$array_phone]);
        }

        $emp_day = DB::table('employee_days')
        ->join('employees','employee_days.id_empday','=','employees.emp_id')
        ->select('employee_days.id_empday')
        ->where('employee_days.id_empday','=',$emp_id)
        ->groupBy('employee_days.id_empday')
        ->get();

        $array_day= json_decode( json_encode($emp_day), true);

        if($array_day != []){
            employee_day::destroy([$array_day]);
        }

        $request->validate([
            'emp_prefix' => 'required',
            'emp_firstname' => 'required',
            'emp_lastname' => 'required',
            'emp_email' => 'required',
            'emp_gender' => 'required',
            'emp_image' ,
            'emp_bdate' => 'required',
            'emp_position' => 'required',
            'emp_id_card' => 'required',
            'emp_nationality' => 'required',
            'emp_religion' => 'required',
            'emp_province' => 'required',
            'emp_amphur' => 'required',
            'emp_district' => 'required',
            'emp_postcode' => 'required',
            'emp_address',
            'emp_salary' => 'required',
            'emp_username' => 'required',
            'emp_password' => 'required',
        ]);
        if($request->hasFile("emp_image")){
            $empimage=employee::find($emp_id);
            $imageOld=Storage::disk('local')->exists("public/employee_image/".$empimage->emp_image);
            if($imageOld){
                Storage::delete("public/employee_image/".$empimage->emp_image);
            }
            $request->emp_image->storeAs("public/employee_image/",$empimage->emp_image);
        }

        $employee=employee::find($emp_id);
        $employee->emp_prefix = $request->emp_prefix;
        $employee->emp_firstname = $request->emp_firstname;
        $employee->emp_lastname = $request->emp_lastname;
        $employee->emp_email = $request->emp_email;
        $employee->emp_gender = $request->emp_gender;
        $employee->emp_bdate = $request->emp_bdate;
        $employee->emp_id_position = $request->emp_position;
        $employee->emp_id_card = $request->emp_id_card;
        $employee->emp_nationality = $request->emp_nationality;
        $employee->emp_religion = $request->emp_religion;
        $employee->emp_province = $request->emp_province;
        $employee->emp_amphur = $request->emp_amphur;
        $employee->emp_district = $request->emp_district;
        $employee->emp_postcode = $request->emp_postcode;
        $employee->emp_address = $request->emp_address;
        $employee->emp_salary = $request->emp_salary;
        $employee->emp_username = $request->emp_username;
        $employee->emp_password = $request->emp_password;
        $employee->save();


        foreach($request['emp_phone_number'] as $item => $value){
            $data2 = array(
                'id_emp' => $emp_id,
                'emp_phone_number' => $request['emp_phone_number'][$item],
            );
            employee_phone::create($data2);
        }
        foreach($request['emp_day'] as $item => $value){
            $data3 = array(
                'id_empday' => $emp_id,
                'emp_day' => $request['emp_day'][$item],
            );
            employee_day::create($data3);
        }

        return redirect('/User/EmployeeDashboard');
    }

    public function remove($emp_id)
    {
        $empimage=employee::find($emp_id);
        $imageOld=Storage::disk('local')->exists("public/employee_image/".$empimage->emp_image);
            if($imageOld){
                Storage::delete("public/employee_image/".$empimage->emp_image);
            }

        employee::destroy($emp_id);
        return redirect('/User/EmployeeDashboard');
    }

    public function search(Request $request)
    {
        $result=$request->search;

        $employees = DB::table('employees')
        ->join('emp_positions','employees.emp_id_position',"LIKE",'emp_positions.emp_position_id')
        ->where('emp_firstname',"LIKE","%{$result}%")
        ->orwhere('emp_lastname',"LIKE","%{$result}%")
        ->orwhere('emp_id',"LIKE","%{$result}%")
        ->orwhere('emp_email',"LIKE","%{$result}%")
        ->orwhere('emp_position_name',"LIKE","%{$result}%")
        ->paginate(3);

        return view("User.SearchEmployee")
        ->with("employees",$employees)
        ->with('emp_positions',emp_position::all());
    }

    public function fetch_amphur(Request $request)
    {
        $id=$request->get('select');
        $query=DB::table('province')
        ->join('amphur','province.PROVINCE_ID','=','amphur.PROVINCE_ID')
        ->select('amphur.AMPHUR_NAME','amphur.AMPHUR_ID')
        ->where('province.PROVINCE_ID',$id)
        ->groupBy('amphur.AMPHUR_NAME','amphur.AMPHUR_ID')
        ->get();
        $output='<option value="">เลือกข้อมูลอำเภอ/เขต</option>';
        foreach($query as $row){
            $output.='<option value="'.$row->AMPHUR_ID.'">' .$row->AMPHUR_NAME.'</option>';
        }
        echo $output;
    }

    public function fetch_district(Request $request)
    {
        //echo $request->get('select');
        $id=$request->get('select');
        $query=DB::table('amphur')
        ->join('district','amphur.AMPHUR_ID','=','district.AMPHUR_ID')
        ->select('district.DISTRICT_NAME','district.DISTRICT_ID')
        ->where('amphur.AMPHUR_ID',$id)
        ->groupBy('district.DISTRICT_NAME','district.DISTRICT_ID')
        ->get();
        $output='<option value="">เลือกข้อมูลตำบล/แขวง</option>';
        foreach($query as $row){
            $output.='<option value="'.$row->DISTRICT_ID.'">' .$row->DISTRICT_NAME.'</option>';
        }
        echo $output;
    }

    public function fetch_postcode(Request $request)
    {
        $id=$request->get('select');
        $query=DB::table('district')
        ->select('district.DISTRICT_ID','district.POSTCODE')
        ->where('district.DISTRICT_ID',$id)
        ->groupBy('district.POSTCODE','district.DISTRICT_ID')
        ->get();
        $output='<option value="">เลือกข้อมูลรหัสไปรษณีย์</option>';
        foreach($query as $row){
            $output.='<option value="'.$row->POSTCODE.'">' .$row->POSTCODE.'</option>';
        }
        echo $output;
    }
}
