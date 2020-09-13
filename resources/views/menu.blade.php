<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/3124180812.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" ></script>
  <link href="{{asset('/css/style.css')}}" rel="stylesheet">
  <title>บริการสปาบ้านอยู่เย็น</title>

  <!-- Bootstrap core CSS -->
<link href="{{asset('style/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('style/css/simple-sidebar.css')}}" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="color:white; font-size:20px;">บริการสปาบ้านอยู่เย็น</div>
      <div class="list-group list-group-flush">
        <button class="dropdown-btn" style="color:white; font-size:16px;">จัดการข้อมูลพนักงาน
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="/User/EmployeeDashboard" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">พนักงาน</a>
            <a href="/User/createEmployeePosition" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">ตำแหน่ง</a>
          </div>
          <button class="dropdown-btn" style="color:white; font-size:16px;">จัดการข้อมูลบริการสปา
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
            <a href="/Spa/SpaCategoryDashboard" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">ประเภทบริการ</a>
            <a href="/Spa/SpaDashboard" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">รายการเดี่ยว</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">แพ็กเกจบริการสปา</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">แพ็กเกจแต้มเงินสด</a>
          </div>
        </div>
          <a href="/Product/ProductDashboard" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">จัดการข้อมูลผลิตภัณฑ์</a>
          <a href="" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">จัดการข้อมูลลูกค้า</a>
          <a href="" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">จัดการข้อมูลห้องสปา</a>
          <a href="" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">จัดการข้อมูลบริษัทคู่ค้า</a>
          <a href="" class="list-group-item list-group-item-action bg-dark" style="color:white; font-size:16px;">ระบบลงคิว</a>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-success  " id="menu-toggle"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('body')
    </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('style/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
