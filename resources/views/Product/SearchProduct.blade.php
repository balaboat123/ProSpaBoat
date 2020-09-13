@extends('menu')
@section('body')
<br>
<h1>รายการผลิตภัณฑ์</h1>
<div class="col-sm-6">
<table class="table table-borderd" id="tel">
    <tr>
    <td>
        <form action="/Product/searchProduct" method="get">
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
        <th scope="col">รายละเอียด</th>
        <th scope="col">ปริมาณ</th>
        <th scope="col">จำนวน</th>
        <th scope="col">
            <a href="/Product/createProduct" class="btn btn-success">เพิ่มผลืตภัณฑ์</a>
        </th>

      </tr>
    </thead>
    <tbody>
        @foreach($products ?? '' as $product)
    <tr>
    <th scope="row">{{$product->pro_id}}</th>
      <td>
      <img src="{{asset('storage')}}/product_image/{{$product->pro_image}}" alt="" width="100px" height="100px">
      </td>
      <td>{{$product->pro_name}}</td>
      <td>{{$product->pro_description}}</td>
      <td>{{$product->pro_volume}} ML</td>
      <td>เว้นไว้ก่อน</td>
        </td>
      <td>
        <a href="/Product/editProduct/{{$product->pro_id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
      <a href="/Product/removeProduct/{{$product->pro_id}}" onclick="return confirm('ต้องการลบข้อมูลหรือไม่')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="container-fluid float-right">
    {{ $products->links() }}
</div>
@endsection
