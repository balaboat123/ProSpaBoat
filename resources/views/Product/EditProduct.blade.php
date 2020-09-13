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
    <h2>แก้ไขข้อมูลผลิตภัณฑ์</h2>
    <img src="{{asset('storage')}}/product_image/{{$product->pro_image}}" alt="" width="200px" height="200px">
    <form action="/Product/updateProduct/{{$product->pro_id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="กรอกชื่อ" value="{{$product->pro_name}}">
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control"  name="pro_image" id="pro_image">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียด</label>
            <textarea id="pro_description" class="form-control" name="pro_description" rows="5" cols="50">{{$product->pro_description}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">ปริมาณ</label>
            <input type="number" class="form-control" name="pro_volume" id="pro_volume" placeholder="กรอกจำนวน" value="{{$product->pro_volume}}">
        </div>
        <div class="form-group">
            <label for="category">ปริมาณเมื่อถึงจุดสั่งซื้อ</label>
            <input type="number" class="form-control" name="pro_purchase" id="pro_purchase" placeholder="กรอกจำนวน" value="{{$product->pro_purchase}}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>

@endsection
