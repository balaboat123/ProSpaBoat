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
    <h2>แก้ไขข้อมูลพนักงาน</h2>
    <img src="{{asset('storage')}}/employee_image/{{$employee->emp_image}}" alt="" width="200px" height="200px">
    <form action="/User/updateEmployee/{{$employee->emp_id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-6">
        <div class="form-group">
            <label for="first prefix">คำนำหน้า</label>
            <select name="emp_prefix" id="emp_prefix" class="form-control">
                <option value="{{$employee->emp_prefix}}">{{$employee->emp_prefix}}</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>
            <label for="first name">ชื่อ</label>
            <input type="text" class="form-control" name="emp_firstname" id="emp_firstname" placeholder="First Name" value="{{$employee->emp_firstname}}">
        </div>
        <div class="form-group">
            <label for="last name">นามสกุล</label>
            <input type="text" class="form-control" name="emp_lastname" id="emp_lastname" placeholder="Last Name" value="{{$employee->emp_lastname}}">
        </div>
        <div class="form-group">
            <label for="email">อีเมล</label>
            <input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="E-mail" value="{{$employee->emp_email}}">
        </div>
        <div class="form-group">
            <label for="gender">เพศ</label>
            <select name="emp_gender" id="emp_gender" class="form-control">
                <option value="{{$employee->emp_gender}}">{{$employee->emp_gender}}"</option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
        <input type="file" class="form-control"  name="emp_image" id="emp_image" value="{{$employee->emp_image}}">
        </div>
        <div class="form-group">
            <label for="emp_bdate">วันเกิด</label>
            <input type="date" id="emp_bdate" name="emp_bdate" class="form-control" value="{{$employee->emp_bdate}}">
        </div>
        <div class="form-group">
            <label for="emp_position">ตำแหน่ง</label>
            <select name="emp_position" id="emp_position" class="form-control">
                <option value="{{$employee->emp_id_position}}">
                    @foreach($emp_positions ?? '' as $position)
                    @if($employee->emp_id_position == $position->emp_position_id)
                    {{$position->emp_position_name}}
                    @endif
                    @endforeach
                </option>
                @foreach($emp_positions as $emp_position)
                    <option value="{{$emp_position->emp_position_id}}">{{$emp_position->emp_position_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_card">รหัสบัตรประชาชน</label>
            <input type="number" class="form-control" name="emp_id_card" id="emp_id_card" placeholder="รหัสประจำตัวประชาชน" value="{{$employee->emp_id_card}}">
        </div>
        <div class="form-group">
            <label for="nationality">สัญชาติ</label>
            <input type="text" class="form-control" name="emp_nationality" id="emp_nationality" placeholder="สัญชาติ" value="{{$employee->emp_nationality}}">
        </div>
        <div class="form-group">
            <label for="religion">ศาสนา</label>
            <input type="text" class="form-control" name="emp_religion" id="emp_religion" placeholder="ศาสนา" value="{{$employee->emp_religion}}">
        </div>
        <div class="form-group">
            <label for="username">เงินเดือน</label>
            <input type="number" class="form-control" name="emp_salary" id="emp_salarys" placeholder="Salary" value="{{$employee->emp_salary}}">
        </div>
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" class="form-control" name="emp_username" id="emp_username" placeholder="Username" value="{{$employee->emp_username}}">
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="text" class="form-control" name="emp_password" id="emp_password" placeholder="Password" value="{{$employee->emp_password}}">
        </div>
            </div>
        {{-- ////////////////////////////////////////////////////////////////////////// --}}
        <div class="col-sm-6">
        <div class="form-group">
            <label for="gender">จังหวัด</label>
            <select name="emp_province" class="form-control province">
            <option value="{{$employee->emp_province}}">
                @foreach ($list_province as $row)
                @if($employee->emp_province == $row->PROVINCE_ID)
                    {{ $row->PROVINCE_NAME }}
                @endif
                @endforeach
            </option>
                @foreach ($list_province as $row)
            <option value="{{$row->PROVINCE_ID}}">{{$row->PROVINCE_NAME}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gender">อำเภอ/เขต</label>
            <select name="emp_amphur" class="form-control amphur">
                <option value="{{$employee->emp_amphur}}">
                    @foreach ($list_amphur as $row)
                    @if($employee->emp_amphur == $row->AMPHUR_ID)
                        {{ $row->AMPHUR_NAME }}
                    @endif
                    @endforeach
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">ตำบล/แขวง</label>
            <select name="emp_district" id="emp_district_id" class="form-control district">
                <option value="{{$employee->emp_district}}">
                    @foreach ($list_district as $row)
                    @if($employee->emp_district == $row->DISTRICT_ID)
                        {{ $row->DISTRICT_NAME }}
                    @endif
                    @endforeach
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">รหัสไปรษณีย์</label>
            <select name="emp_postcode" id="emp_postcode" class="form-control postcode">
                <option value="{{$employee->emp_postcode}}">{{$employee->emp_postcode}}</option>
            </select>
        </div>
        {{-- ////////////////////////////////////////////////////////////////////////// --}}
        <div class="form-group">
            <label for="address">รายละเอียดที่อยู่</label><br>
            <textarea id="emp_address" class="form-control" name="emp_address" rows="5" cols="50">{{$employee->emp_address}}</textarea>
        </div>
        <table class="table table-borderd" id="tel">
            <tr>
              <th>เบอร์โทรศัพท์</th>
              <th><input type="button" class="btn btn-success addRowTel" value="+"></th>
            </tr>
            @foreach($employee_phones ?? '' as $employee_phone)
            @if($employee->emp_id == $employee_phone->id_emp)
            <tr>
                <td><input type="text"  class="form-control" value="{{$employee_phone->emp_phone_number}}" name="emp_phone_number[]" id="emp_phone_number"></td>
                <td><input type="button" class="btn btn-danger remove" value="x"></td>
            </tr>
            @endif
            @endforeach
        </table>
        {{-- ////////////////////////////////////////////////////////////////////////// --}}
                  <table class="table table-borderd" id="day">
                    <tr>
                      <th>วันทำงานของพนักงาน</th>
                      <th><input type="button" class="btn btn-success addRowDay" value="+"></th>
                    </tr>
                    @foreach($employee_days ?? '' as $employee_day)
                    @if($employee->emp_id == $employee_day->id_empday)
                    <tr>
                        <td>
                          <div class="form-group">
                            <select name="emp_day[]" id="emp_day" class="form-control">
                                <option value="{{$employee_day->emp_day}}">{{$employee_day->emp_day}}</option>
                                <option value="จันทร์">จันทร์</option>
                                <option value="อังคาร">อังคาร</option>
                                <option value="พุธ">พุธ</option>
                                <option value="พฤหัสบดี">พฤหัสบดี</option>
                                <option value="ศุกร์">ศุกร์</option>
                                <option value="เสาร์">เสาร์</option>
                                <option value="อาทิตย์">อาทิตย์</option>
                            </select>
                          </div>
                        </td>
                      <td><input type="button" class="btn btn-danger remove" value="x"></td>
                    </tr>
                    @endif
                    @endforeach
                </table>
        </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script type="text/javascript">
    $('.province').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            //console.log(select);
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_amphur')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
                    //ทำไรต่อ
                    $('.amphur').html(result);
                }
            })
        }
    });

    $('.amphur').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            //console.log(select);
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_district')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
                    //ทำไรต่อ
                    $('.district').html(result);
                }
            })
        }
    });
    $('.district').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            //console.log(select);
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_postcode')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
                    //ทำไรต่อ
                    $('.postcode').html(result);
                }
            })
        }
    });
    $('.addRowTel').on('click',function(){
        addRowTel();
    });
    function addRowTel(){
        var p1='<tr>'+'<td><input type="number" name="emp_phone_number[]"  class="form-control" id="emp_phone_number" placeholder="เบอร์โทรศัพท์"></td>'
        +'<td><input type="button" class="btn btn-danger remove" value="x"></td>'+'</tr>'
        $('#tel').append(p1);
    }
    $('.addRowDay').on('click',function(){
        addRowDay();
    });
    function addRowDay(){
        var p2='<tr>'+'<td><select  id="emp_day" name="emp_day[]" class="form-control">'
            +'<option value="">กรุณาเลือกวันทำงานของพนักงาน</option>'
            +'<option value="จันทร์">จันทร์</option>'
            +'<option value="อังคาร">อังคาร</option>'
            +'<option value="พุธ">พุธ</option>'
            +'<option value="พฤหัสบดี">พฤหัสบดี</option>'
            +'<option value="ศุกร์">ศุกร์</option>'
            +'<option value="เสาร์">เสาร์</option>'
            +'<option value="อาทิตย์">อาทิตย์</option>'
            +'</select></td>'
            +'<td><input type="button" class="btn btn-danger remove" value="x"></td>'+'</tr>'
        $('#day').append(p2);
    }
    $('.remove').live('click',function(){
        $(this).parent().parent().remove();
    });
</script>
@endsection
