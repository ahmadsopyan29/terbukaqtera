<?php
include "header.php";
$batastelat = new DateTime( '08:30:00' );
extract($_GET);
extract($_POST);
$tanggal = date("F");
if(! empty($hasil)){
  echo "<script> alert('".$hasil."');</script>";
}
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Riwayat Absen
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Absen</li>
      <li class="active">Riwayat Absen</li>
    </ol>
  </section>

  <!-- Main content -->
    <section class="content">
    <div class="box">
    <div class="box-body">
    <div id="tabelpegawai_wrapper">
    <?php $bulan = array("Januari", "Pebruari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"); ?>
    <?php $btn = array("primary", "info"); ?>
    <?php for($i=idate('Y'); $i>2017; $i--){ ?>
    <h4><?=$i?></h4>
      <?php if($i==idate('Y')){ $count = idate('m');}else{ $count = 12; } ?>
      <?php for($j=0; $j<$count; $j++){ ?>
      <?php $btncolor = $j%2; ?>
      <a href="testact.php?aksi=export&&tanggal=<?=$i?>-<?=$j+1?>" class="btn btn-<?=$btn[$btncolor]?>" style="margin-bottom: 20px"><?=$bulan[$j]?> <?=$i?></a>
      <?php }
    } ?>
    </div>
    </div>
  </section>
</div>

<?php
include "footer.php"

?>
