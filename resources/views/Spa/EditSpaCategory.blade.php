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
    <h2>แก้ไขประเภทบริการ</h2>
    <form action="/Spa/updateSpaCategory/{{$spa_categories->spa_id_category}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="spa_category_name" id="spa_category_name" placeholder="กรอกชื่อ.." value="{{$spa_categories->spa_category_name}}">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
