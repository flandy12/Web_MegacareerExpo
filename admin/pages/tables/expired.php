<?php
@session_start();

if (empty($_SESSION["ON"]))
{
   echo"<script language='javascript'> 
            window.location='../../login.php';
        </script>";    
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  // Create database connection using config file
  include_once("config.php");
  $date = date('Y-m-d');
  $date2 = date('ym');
  $nextWeek = date("Y-m-d", strtotime("+7 days"));
  
  // echo $date;
  // echo date('d-m-Y', strtotime('+1 week', strtotime($date1)));
  // Fetch all users data from database
  $result = mysqli_query($mysqli, "SELECT * FROM orders where tgl_akhir BETWEEN '$date' AND '$nextWeek' AND accept = 'Y'");
  $result2 = mysqli_query($mysqli, "SELECT * FROM orders where tgl_akhir < '$date' AND accept = 'Y'");
  ?>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="logout.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <p>logout</p>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../tables/data.php" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php include '../../page/sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>companyname</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Tanggal Awal Pesan</th>
                    <th>Tanggal Akhir Pesan</th>
                    <th>spot</th>
                    <th>message</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Accept</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    $dbValue = $user_data['order_id'];
                    echo "<td>" . $dbValue = "CKH$date2".str_pad($dbValue, 3, "0", STR_PAD_LEFT) . "</td>";
                    echo "<td>" . $user_data['companyname'] . "</td>";
                    echo "<td>" . $user_data['name'] . "</td>";
                    echo "<td>" . $user_data['phone'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['tgl_awal'] . "</td>";
                    echo "<td bgcolor = 'yellow'>" . $user_data['tgl_akhir'] . "</td>";
                    echo "<td>" . $user_data['spot'] . "</td>";
                    echo "<td>" . $user_data['message'] . "</td>";
                    echo "<td>" . $user_data['accept'] . "</td>";
                    echo "<td><a href='delete.php?id=$user_data[order_id]'>Delete</a></td>";
                    echo "<td><a href='update.php?id=$user_data[order_id]'>Accept</a></td></tr>";
                    $tgl = $user_data['tgl_akhir'];
                    // echo $tgl;
                    // $date = date($tgl);  //23-02-2015
                    // echo date('d-m-Y', strtotime('-1 week', strtotime($date)));
                }
                  
                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Expired</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>companyname</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Tanggal Awal Pesan</th>
                    <th>Tanggal Akhir Pesan</th>
                    <th>spot</th>
                    <th>message</th>
                    <th>Accept</th>
                    <th>Action</th>
                    <th>Accept</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($user_data = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    $dbValue = $user_data['order_id'];
                    echo "<td>" . $dbValue = "CKH$date2".str_pad($dbValue, 3, "0", STR_PAD_LEFT) . "</td>";
                    echo "<td>" . $user_data['companyname'] . "</td>";
                    echo "<td>" . $user_data['name'] . "</td>";
                    echo "<td>" . $user_data['phone'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['tgl_awal'] . "</td>";
                    echo "<td bgcolor='#eb471e'>" . $user_data['tgl_akhir'] . "</td>";
                    echo "<td>" . $user_data['spot'] . "</td>";
                    echo "<td>" . $user_data['message'] . "</td>";
                    echo "<td>" . $user_data['accept'] . "</td>";
                    echo "<td><a href='delete.php?id=$user_data[order_id]'>Delete</a> | <a href='ganti.php?id=$user_data[order_id]'>Update</a> </td>";
                    echo "<td><a href='update.php?id=$user_data[order_id]'>Accept</a></td></tr>";
                    $tgl = $user_data['tgl_akhir'];
                    // echo $tgl;
                    // $date = date($tgl);  //23-02-2015
                    // echo date('d-m-Y', strtotime('-1 week', strtotime($date)));


                }
                  
                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
  $(function () {
    $("#example3").DataTable();
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
