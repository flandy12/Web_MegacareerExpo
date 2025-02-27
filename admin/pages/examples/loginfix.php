<?php
@session_start();
if (!empty($_SESSION['ON'])) {
  echo "<script language=\"JavaScript\">{location.href=\"../../index.php\";self.focus();}</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>Admin</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php 
          if (isset($_POST["login"])) {
          include_once("config.php");
            // menangkap data yang dikirim dari form
            $username = $_POST['email'];
            $password = $_POST['password'];
             
            // menyeleksi data admin dengan username dan password yang sesuai
            // $data = mysqli_query($conn,"select * from user where email_id='$username' and password='$password'");
             $query = "select count(id_admin) as jml from admin where email='$username' and password='$password'";
              if ($result = $mysqli->query($query)) {
                $user = $result->fetch_assoc();
                  $nama_file = $user["jml"];
                  
              if($nama_file > 0){
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                $_SESSION['ON'] = "ON";
                
                echo "<script>alert('Anda berhasil Login')</script>";
                echo "<script>window.location = '../../index.php'</script>";
              }else{
                echo "<script>alert('Login gagal!! Email / Password yang anda masukkan tidak terdaftar')</script>";
                echo "<script>window.location = 'loginfix.php'</script>";
              }
                $result->free();
            }
          }
      ?>

      
      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
<?php
}
?>