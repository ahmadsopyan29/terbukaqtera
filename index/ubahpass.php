<?php
session_start();
if(empty($_SESSION)){
  header("location:../index.php");
}
$nik = $_SESSION['nik'];
include "../aksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Qtera Mandiri</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Qtera</b> Mandiri</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-box-body">
      <p class="login-box-msg"><?php if(! empty($error)) { echo $error; } else { echo "Ubah Password"; }?></p>
      <form action="#" method="post">
        <input type="hidden" name="nik" value="<?php echo $_SESSION['nik'];?>">
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password lama" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <hr>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password baru" name="passwordbaru1">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Ulangi password baru" name="passwordbaru2">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      <div class="row">
        <div class="col-xs-4">
          <a href="index.php" class="btn btn-block btn-flat">Back</a>
        </div>
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="pass" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <!-- 
      <a href="#">I forgot my password</a>
    -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
</body>
</html>
