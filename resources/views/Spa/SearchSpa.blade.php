@extends('menu')
@section('body')

<h1>บริการสปา</h1>
<div class="col-sm-6">
    <table class="table table-borderd" id="tel">
        <tr>
        <td>
            <form action="/Spa/SearchSpa" method="get">
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
<table class="table table-striped table-dark my-2">
    <thead>
      <tr>
        <th scope="col">รหัส</th>
        <th scope="col">รูปภาพ</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">รายละเอียด</th>
        <th scope="col">ราคา</th>
        <th scope="col">ระยะเวลา</th>
        <th scope="col">ประเภท</th>
        <th scope="col">
            <a href="/Spa/createSpa" class="btn btn-success">เพิ่มบริการสปา</a>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach($spas ?? '' as $spa)
      <tr>
        <th scope="row">{{$spa->spa_id}}</th>
        <td>
            <img src="{{asset('storage')}}/spa_image/{{$spa->spa_image}}" alt="" width="100px" height="100px">
            </td>
        <td>{{$spa->spa_name}}</td>
        <td>{{$spa->spa_description}}</td>
        <td>{{$spa->spa_price}}</td>
        <td>{{$spa->spa_time}} นาที</td>
        <td>
            @foreach ($spa_categories as $spa_category)
            @if($spa->spa_category_id ==$spa_category->spa_id_category)
            {{$spa_category->spa_category_name}}
            @endif
            @endforeach
        </td>
        <td>
            <a href="/Spa/editSpa/{{$spa->spa_id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <a href="/Spa/removeSpa/{{$spa->spa_id}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
          </td>
      </tr>
          @endforeach
    </tbody>
  </table>
  <div class="container-fluid float-right">
    {{ $spas->links() }}
</div>
@endsection
