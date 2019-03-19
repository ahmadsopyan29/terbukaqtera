<?php
include "connectdb.php";
session_start();
if(empty($_SESSION)){
  header("location:../index.php");
}
$nik = $_SESSION['nik'];
$nik_pegawai = $_SESSION['nik'];
$level = $_SESSION['level'];
$head = mysqli_query($mysqli,"SELECT namalengkap,namapanggilan,id_dept,status_anggota FROM karyawan WHERE nik='$nik'");
$header = mysqli_fetch_array($head);
$name = $header['namapanggilan'];

date_default_timezone_set('Asia/Jakarta');
$tgl1 = date('Y-m-d');
              $date  = strtotime($tgl1);
              $day   = date('d',$date);
              $month = date('m',$date);
              $year  = date('Y',$date);

$tgl2 = date('Y-m-d', strtotime('+2 months', strtotime($tgl1)));
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- jQuery 3 -->
  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Q </b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Qtera</b> Mandiri</span>-->
      </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $header['namapanggilan'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $header['namalengkap'];?>
                      <small><?php echo $_SESSION['nik'];?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="row">
                      <div class="col-sm-6">
                        <a href="ubahpass.php" class="btn btn-default btn-flat">Change Password</a>
                      </div>
                      <div class="col-sm-6" align="right">
                        <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $header['namalengkap'];?></p>
            <a href="#"><?php echo $_SESSION['nik'];?></a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <?php
          if ($level=='0' OR $level == '1') {
          ?>
          <!-- DASHBOARD -->
          <li class="">
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <!-- <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> -->
            </a>
          </li>
          <!-- DASHBOARD -->
          <!-- DATA PEGAWAI -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href='datapegawai.php'><i class='fa fa-circle-o'></i>Data Pegawai</a></li>
              <li><a href='datakuotacuti.php'><i class='fa fa-circle-o'></i>Data Kuota Cuti</a></li>
              <li><a href='datacustomer.php'><i class='fa fa-circle-o'></i>Data Customer</a></li>
              <li><a href='datapartner.php'><i class='fa fa-circle-o'></i>Data Partner</a></li>
              <li><a href='dataproduct.php'><i class='fa fa-circle-o'></i>Data Product</a></li>
              <li><a href='datadepartement.php'><i class='fa fa-circle-o'></i>Data Departement</a></li>
            </ul>
          </li>
          <!-- DATA PEGAWAI -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>Data Project</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href='datasprf.php'><i class='fa fa-circle-o'></i>Special Project Request Form</a></li>
              <li><a href='dataquotation.php'><i class='fa fa-circle-o'></i>Quotation</a></li>
              <li><a href='datainfoharga.php'><i class='fa fa-circle-o'></i>Informasi Harga</a></li>
            </ul>
          </li>
          <!-- DATA ABSEN -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Data Absen</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php
                $select=mysqli_query($mysqli,"SELECT nik, namapanggilan FROM karyawan WHERE aktif='1' ORDER BY nik");
                while ($nama=mysqli_fetch_array($select)) {
                  $nik=$nama['nik'];
                  $name=$nama['namapanggilan'];
                  if ($nik=='00000000'||$nik=='11111111') {
                    # code...
                  } else {
                    echo "<li><a href='dataabsen.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                  }
                }
              ?>
            </ul>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span>Data Leave Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Pengajuan Cuti
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php
                $select=mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month GROUP BY a.nik ORDER BY a.status ASC");
                while ($nama=mysqli_fetch_array($select)) {
                  $nik=$nama['nik'];
                  $name=$nama['namapanggilan'];
                  if ($nik=='00000000'||$nik=='11111111') {
                    # code...
                  } else {
                    echo "<li><a href='datapengajuan.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                  }
                }
              ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Pengajuan Top Up
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php
                $select=mysqli_query($mysqli,"SELECT * FROM pengajuan_topup a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month GROUP BY a.nik ORDER BY a.status ASC");
                while ($nama=mysqli_fetch_array($select)) {
                  $nik=$nama['nik'];
                  $name=$nama['namapanggilan'];
                  if ($nik=='00000000'||$nik=='11111111') {
                    # code...
                  } else {
                    echo "<li><a href='datatopup.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                  }
                }
              ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Ijin Sakit
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php
                $select=mysqli_query($mysqli,"SELECT * FROM ijin_sakit a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month GROUP BY a.nik ORDER BY a.status ASC");
                while ($nama=mysqli_fetch_array($select)) {
                  $nik=$nama['nik'];
                  $name=$nama['namapanggilan'];
                  if ($nik=='00000000'||$nik=='11111111') {
                    # code...
                  } else {
                    echo "<li><a href='dataijinsakit.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                  }
                }
              ?>
              </ul>
            </li>
            
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href='laporancuti.php'><i class='fa fa-circle-o'></i>Cuti</a></li>
              <li><a href='laporantopup.php'><i class='fa fa-circle-o'></i>Top Up</a></li>
              <li><a href='laporanijinsakit.php'><i class='fa fa-circle-o'></i>Ijin Sakit</a></li>
            </ul>
          </li>
          
         
          
          <?php
          } elseif ($level=='2') {
          ?>
          <!-- DASHBOARD -->
          <li class="">
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <!-- <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span> -->
            </a>
          </li>
          <!-- DASHBOARD -->
          <!-- DATA PEGAWAI -->
          <li class="">
            <a href="form_pegawai.php?nik=<?php echo $_SESSION['nik'];?>">
              <i class="fa fa-file-text-o"></i> <span>Data Pegawai</span>
            </a>
          </li>
          <!-- DATA PEGAWAI -->
          <!-- DATA PEGAWAI -->
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-hand-stop-o"></i> <span>Absensi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href='absensi.php'><i class='fa fa-circle-o'></i>Absen IN</a></li>
              <li><a href='absensi_out.php'><i class='fa fa-circle-o'></i>Absen OUT</a></li>
              
              
            </ul>
          </li>
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar-times-o"></i> <span>Leave Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href='data_pengajuan.php'><i class='fa fa-circle-o'></i>Pengajuan Cuti</a></li>
              <li><a href='data_topup.php'><i class='fa fa-circle-o'></i>Pengajuan Top Up</a></li>
              <li><a href='data_ijinsakit.php'><i class='fa fa-circle-o'></i>Ijin Sakit</a></li>
              
            </ul>
          </li>
          <?php
          $lead = $header['status_anggota'];
          $dept = $header['id_dept'];
          if($lead == 1){ ?>

            <li class="treeview">
            <a href="#">
              <i class="fa fa-check-square-o"></i> <span>Approve</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Pengajuan Cuti
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                <?php
                  $select=mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND id_dept = $dept GROUP BY a.nik ORDER BY a.status ASC");
                  while ($nama=mysqli_fetch_array($select)) {
                    $nik=$nama['nik'];
                    $name=$nama['namapanggilan'];
                    if ($nik=='00000000'||$nik=='11111111') {
                      # code...
                    } else {
                      echo "<li><a href='datapengajuan.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                    }
                  }
                ?>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Pengajuan Top Up
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                <?php
                  $select=mysqli_query($mysqli,"SELECT * FROM pengajuan_topup a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month GROUP BY a.nik ORDER BY a.status ASC");
                  while ($nama=mysqli_fetch_array($select)) {
                    $nik=$nama['nik'];
                    $name=$nama['namapanggilan'];
                    if ($nik=='00000000'||$nik=='11111111') {
                      # code...
                    } else {
                      echo "<li><a href='datatopup.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                    }
                  }
                ?>
                </ul>
              </li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Ijin Sakit
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                <?php
                  $select=mysqli_query($mysqli,"SELECT * FROM ijin_sakit a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month GROUP BY a.nik ORDER BY a.status ASC");
                  while ($nama=mysqli_fetch_array($select)) {
                    $nik=$nama['nik'];
                    $name=$nama['namapanggilan'];
                    if ($nik=='00000000'||$nik=='11111111') {
                      # code...
                    } else {
                      echo "<li><a href='dataijinsakit.php?nik=".$nik."'><i class='fa fa-circle-o'></i>".$name."</a></li>";
                    }
                  }
                ?>
                </ul>
              </li>
              
            </ul>
          </li>
                  <?php
          } ?>
          
          <!-- DATA ABSEN -->
          <?php
          } else {
            ?>
            <!-- DASHBOARD -->
            <li class="">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <!-- <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> -->
              </a>
            </li>
            <!-- DASHBOARD -->
          <?php 
          }
          ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
