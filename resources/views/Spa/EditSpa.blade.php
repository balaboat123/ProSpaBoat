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
    <h2>แก้ไขบริการสปา</h2>
    <img src="{{asset('storage')}}/spa_image/{{$spa->spa_image}}" alt="" width="200px" height="200px">
    <form action="/Spa/editSpa/{{$spa->spa_id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="spa_name" id="spa_name" placeholder="Spa Name" value="{{$spa->spa_name}}">
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control"  name="spa_image" id="spa_image">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียด</label><br>
            <textarea id="spa_description" class="form-control" name="spa_description" rows="5" cols="50">{{$spa->spa_description}}</textarea>
        </div>
        <div class="form-group">
            <label for="type">ประเภทบริการ</label>
        <select class="form-control" name="spa_category_id">
            <option value="{{$spa->spa_category_id}}">
                @foreach ($spa_categories as $spa_category)
                @if($spa->spa_category_id ==$spa_category->spa_id_category)
                {{$spa_category->spa_category_name}}
                @endif
                @endforeach
            </option>
            @foreach($spa_categories as $spa_category)
            <option value="{{$spa_category->spa_id_category}}">{{$spa_category->spa_category_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">ราคา</label>
            <input type="number" class="form-control" name="spa_price" id="spa_price" placeholder="Spa Price" value="{{$spa->spa_price}}">
        </div>
        <div class="form-group">
            <label for="time">ระยะเวลา</label>
            <input type="number" class="form-control" name="spa_time" id="spa_time" placeholder="ระยะเวลา" value="{{$spa->spa_time}}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>


@endsection
