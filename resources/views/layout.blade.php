<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="../css/sidebar.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->
</nav>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a href="/Spa/SpaDashboard" class="list-group-item list-group-item-action bg-light">บริการสปา</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">คอร์สสปา</a>
        <a href="/User/EmployeeDashboard" class="list-group-item list-group-item-action bg-light">พนักงาน</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">ผลิตภัณฑ์</a>
        <a href="/Spa/createSpaCategory" class="list-group-item list-group-item-action bg-light">บริษัทคู่ค้า</a>
        <a href="/Room/RoomDashboard" class="list-group-item list-group-item-action bg-light">ห้องสปา</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="/Spa/SpaDashboard" class="list-group-item list-group-item-action bg-light">บริการสปา</a>
      </li>
      <li class="nav-item">
        <a href="#" class="list-group-item list-group-item-action bg-light">คอร์สสปา</a>
      </li>
      <li class="nav-item">
        <a href="/User/EmployeeDashboard" class="list-group-item list-group-item-action bg-light">พนักงาน</a>
      </li>
      <li class="nav-item">
        <a href="#" class="list-group-item list-group-item-action bg-light">ผลิตภัณฑ์</a>
      </li>
      <li class="nav-item">
        <a href="/Spa/createSpaCategory" class="list-group-item list-group-item-action bg-light">บริษัทคู่ค้า</a>
      </li>
      <li class="nav-item">
        <a href="/Room/RoomDashboard" class="list-group-item list-group-item-action bg-light">ห้องสปา</a>
      </li>

    </ul>
  </div>
</nav>


      <div class="container-fluid">
        @yield('body')
    </div>

</body>

</html>

