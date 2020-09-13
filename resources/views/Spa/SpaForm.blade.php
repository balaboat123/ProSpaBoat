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
    <h2>เพิ่มบริการสปา</h2>
    <form action="/Spa/createSpa" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="spa_name" id="spa_name" placeholder="ชื่อ..">
        </div>
        <div class="form-group">
            <label for="image">รูปภาพ</label>
            <input type="file" class="form-control"  name="spa_image" id="spa_image">
        </div>
        <div class="form-group">
            <label for="description">รายละเอียด</label><br>
            <textarea id="spa_description" class="form-control" name="spa_description" rows="5" cols="50"></textarea>
        </div>
        </div>


        <div class="col-sm-6">
        <div class="form-group">
            <label for="type">ประเภทบริการ</label>
            <select class="form-control" name="spa_category_id">
                    <option value="">กรุณาเลือกประเภท</option>
                    @foreach($spa_categories as $spa_category)
                    <option value="{{$spa_category->spa_id_category}}">{{$spa_category->spa_category_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="time">ระยะเวลา</label>
            <input type="number" class="form-control" name="spa_time" id="spa_time" placeholder="ระยะเวลา">
        </div>
        <div class="form-group">
            <label for="price">ราคา</label>
            <input type="number" class="form-control" name="spa_price" id="spa_price" placeholder="Spa Price">
        </div>
        </div>
    </div>

    <table id="spa" class="table table-borderd">
        <tr>
            <h3>สูตรผลิตภัณฑ์</h3>
        </tr>
        <tr>
            <td>ลำดับ</td>
            <td>ผลิตภัณฑ์</td>
            <td>ปริมาณ</td>
            <td>
            <input type="button" class="btn btn-success addRowPro" value="+">
            </td>
        </tr>
        <tr>
            <td><ol><li></li></td>
            <td>
                <select class="form-control" name="id_pro[]" id="id_pro">
                    <option value="">กรุณาเลือกผลิตภัณฑ์</option>
                    @foreach($products as $product)
                    <option value="{{$product->pro_id}}">{{$product->pro_name}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text"  class="form-control" name="volume[]" id="volume" placeholder="ใส่ปริมาณที่ใช้">
            </td>
            <td>
                <input type="button" class="btn btn-danger remove" value="x">
            </td>
        </tr>
        <tr>
            <ol id="index">
            </ol>
        </tr>
    </table>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>

<script>
$('.addRowPro').on('click',function(){

    addRowPro();

});
function addRowPro(){
    var p1='<tr>'
        +'<td><li></li></td>'
        +'<td><select class="form-control" name="id_pro[]" id="id_pro">'
        +'<option value="">กรุณาเลือกผลิตภัณฑ์</option>'
        +'@foreach($products as $product)'
        +'<option value="{{$product->pro_id}}">{{$product->pro_name}}</option>'
        +'@endforeach'
        +'</select></td>'
        +'<td><input type="text"  class="form-control" name="volume[]" id="volume" placeholder="ใส่ปริมาณที่ใช้"></td>'
        +'<td><input type="button" class="btn btn-danger remove" value="x"></td>'
        +'</tr>'
    $('#index').append(p1);
}

$('.remove').live('click',function(){
    $(this).parent().parent().remove();
});

</script>
@endsection
