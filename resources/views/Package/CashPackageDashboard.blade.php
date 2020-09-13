@extends('menu')
@section('body')
<br>
<h1>รายชื่อพนักงาน</h1>
<div class="col-sm-6">
<table class="table table-borderd" id="tel">
    <tr>
    <td>
        <form action="/User/searchEmployee" method="get">

        <div class="form-group">
        <input type="text"  class="form-control" name="search" id="search" placeholder="ค้าหา..">

    </div>

    </td>
    <td>
        <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
    </form>

    </td>
    </tr>
</table>
</div>

<table class="table table-striped table-dark">

    <thead>
      <tr>
        <th scope="col">รหัส</th>
        <th scope="col">รูปภาพ</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">อีเมล</th>
        <th scope="col">เพศ</th>
        <th scope="col">เงินเดือน</th>
        <th scope="col">สถานะ</th>
        <th scope="col">
            <a href="/User/createEmployee" class="btn btn-success">เพิ่มพนักงาน</a>
        </th>
      </tr>
    </thead>
    <tbody>

    <tr>
    <th scope="row" style="vertical-align:middle"></th>
      <td>
      <img src="" alt="" width="100px" height="100px">
      </td>
      <td style="vertical-align:middle"></td>
      <td style="vertical-align:middle"></td>
      <td style="vertical-align:middle"></td>
      <td style="vertical-align:middle"></td>
        <th scope="col" style="vertical-align:middle">ยังไม่ทำ</th>
      <td style="vertical-align:middle">
        <a href="/User/editEmployee/" class="btn btn-warning"><i class="fas fa-edit"></i></a>
      <a href="/User/removeEmployee/" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>

    </tbody>
</table>
@endsection
