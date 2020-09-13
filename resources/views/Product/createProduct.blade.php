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
    <h2>เพิ่มข้อมูลผลิตภัณฑ์</h2>
    <form action="/Product/createProduct" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="กรอกชื่อ">
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control"  name="pro_image" id="pro_image">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียด</label>
            <textarea id="pro_description" class="form-control" name="pro_description" rows="5" cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="name">ปริมาณ</label>
            <input type="number" class="form-control" name="pro_volume" id="pro_volume" placeholder="กรอกจำนวน">
        </div>
        <div class="form-group">
            <label for="category">ปริมาณเมื่อถึงจุดสั่งซื้อ</label>
            <input type="number" class="form-control" name="pro_purchase" id="pro_purchase" placeholder="กรอกจำนวน">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection
