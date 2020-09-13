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
    <h2>ประเภทบริการ</h2>
    <div class="col-sm-6">
        <table class="table table-borderd" id="tel">
            <tr>
            <td>
                <form action="/Spa/SearchSpaCategory" method="get">
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
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">
        <a href="/Spa/SpaCategoryForm" class="btn btn-success">เพิ่มประเภทบริการ</a>
      </th>
    </tr>
  </thead>
  <tbody>
      @foreach($spa_categories ?? '' as $spa_category)
    <tr>
      <th scope="row">{{$spa_category->spa_id_category}}</th>
      <td>{{$spa_category->spa_category_name}}</td>
      <td>
          <a href="/Spa/editSpaCategory/{{$spa_category->spa_id_category}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
          <a href="/Spa/removeSpaCategory/{{$spa_category->spa_id_category}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
        @endforeach
  </tbody>
</table>
<div class="container-fluid float-right">
    {{ $spa_categories->links() }}
</div>
@endsection
