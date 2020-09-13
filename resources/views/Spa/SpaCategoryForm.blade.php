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
<div class="table-responsive">
    <h2>เพิ่มประเภทบริการ</h2>
    <form action="/Spa/createSpaCategory" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="spa_category_name" id="spa_category_name" placeholder="กรอกชื่อ..">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
