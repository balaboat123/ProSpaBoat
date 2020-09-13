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
    <h2>เพิ่มข้อมูลพนักงานใหม่</h2>
    <form action="/User/createEmployee" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-6">
        <div class="form-group">
            <label for="first prefix">คำนำหน้า</label>
            <select name="emp_prefix" id="emp_prefix" class="form-control">
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>
            <label for="first name">ชื่อ</label>
            <input type="text" class="form-control" name="emp_firstname" id="emp_firstname" placeholder="ชิ่อ">
        </div>
        <div class="form-group">
            <label for="last name">นามสกุล</label>
            <input type="text" class="form-control" name="emp_lastname" id="emp_lastname" placeholder="นามสกุล">
        </div>
        <div class="form-group">
            <label for="email">อีเมล</label>
            <input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="อีเมล">
        </div>
        <div class="form-group">
            <label for="gender">เพศ</label>
            <select name="emp_gender" id="emp_gender" class="form-control">
                <option value="">กรุณาเลือกเพศ</option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control"  name="emp_image" id="emp_image">
        </div>
        <div class="form-group">
            <label for="emp_bdate">วันเกิด</label>
            <input type="date" id="emp_bdate" name="emp_bdate" class="form-control">
        </div>
        <div class="form-group">
            <label for="emp_position">ตำแหน่ง</label>
            <select name="emp_position" id="emp_position" class="form-control">
                <option value="">กรุณาเลือกตำแหน่ง</option>
                @foreach($emp_positions as $emp_position)
                    <option value="{{$emp_position->emp_position_id}}">{{$emp_position->emp_position_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_card">รหัสบัตรประชาชน</label>
            <input type="number" class="form-control" name="emp_id_card" id="emp_id_card" placeholder="รหัสประจำตัวประชาชน">
        </div>
        <div class="form-group">
            <label for="nationality">สัญชาติ</label>
            <input type="text" class="form-control" name="emp_nationality" id="emp_nationality" placeholder="สัญชาติ">
        </div>
        <div class="form-group">
            <label for="religion">ศาสนา</label>
            <input type="text" class="form-control" name="emp_religion" id="emp_religion" placeholder="ศาสนา">
        </div>
        <div class="form-group">
            <label for="username">เงินเดือน</label>
            <input type="number" class="form-control" name="emp_salary" id="emp_salarys" placeholder="เงินเดือน">
        </div>
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้</label>
            <input type="text" class="form-control" name="emp_username" id="emp_username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" name="emp_password" id="emp_password" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>

        {{-- ////////////////////////////////////////////////////////////////////////// --}}
        <div class="col-sm-6">
        <div class="form-group">
            <label for="gender">จังหวัด</label>
            <select name="emp_province" id="emp_province" class="form-control province">
                <option value="">เลือกข้อมูลจังหวัด</option>
                @foreach ($list as $row)
            <option value="{{$row->PROVINCE_ID}}">{{$row->PROVINCE_NAME}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gender">อำเภอ/เขต</label>
            <select name="emp_amphur" id="emp_amphur" class="form-control amphur">
                <option value="">เลือกข้อมูลอำเภอ/เขต</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">ตำบล/แขวง</label>
            <select name="emp_district" id="emp_district" class="form-control district">
                <option value="">เลือกข้อมูลตำบล/แขวง</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gender">รหัสไปรษณีย์</label>
            <select name="emp_postcode" id="emp_postcode" class="form-control postcode">
                <option value="">เลือกข้อมูลรหัสไปรษณีย์</option>
            </select>
        </div>
        {{-- ////////////////////////////////////////////////////////////////////////// --}}
        <div class="form-group">
            <label for="address">รายละเอียดที่อยู่</label><br>
            <textarea id="emp_address" class="form-control" name="emp_address" rows="5" cols="50"></textarea>
        </div>
        <table class="table table-borderd" id="tel">
            <tr>
              <th>เบอร์โทรศัพท์</th>
            </tr>
            <tr>
              <th>
                  <div class="form-group">
                  <input type="number"  class="form-control" name="emp_phone_number[]" id="emp_phone_number" placeholder="เบอร์โทรศัพท์">
                  </div>
                </th>
              <th><input type="button" class="btn btn-success addRowTel" value="+"></th>
            </tr>
        </table>

                  <table class="table table-borderd" id="day">
                    <tr>
                      <th>วันทำงานของพนักงาน</th>

                    </tr>
                    <tr>
                      <th>
                          <div class="form-group">
                            <select name="emp_day[]" id="emp_day" class="form-control">
                                <option value="">กรุณาเลือกวันทำงานของพนักงาน</option>
                                <option value="จันทร์">จันทร์</option>
                                <option value="อังคาร">อังคาร</option>
                                <option value="พุธ">พุธ</option>
                                <option value="พฤหัสบดี">พฤหัสบดี</option>
                                <option value="ศุกร์">ศุกร์</option>
                                <option value="เสาร์">เสาร์</option>
                                <option value="อาทิตย์">อาทิตย์</option>
                            </select>
                          </div>
                        </th>
                        <th><input type="button" class="btn btn-success addRowDay" value="+"></th>
                    </tr>
                </table>
        </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('.province').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_amphur')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
                    $('.amphur').html(result);
                }
            })
        }
    });
    $('.amphur').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_district')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
                    $('.district').html(result);
                }
            })
        }
    });
    $('.district').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('EmployeeForm.fetch_postcode')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success:function(result){
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
