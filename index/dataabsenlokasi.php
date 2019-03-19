<?php
include "header.php";
$batastelat = new DateTime( '08:30:00' );
extract($_GET);
extract($_POST);
if ($level=='0' || $level=='1') {
  $selectabsen = mysqli_query($mysqli,"SELECT * FROM absen_maps WHERE nik='$nik' && tanggal>='2018-03-01' GROUP BY tanggal ORDER BY tanggal DESC");
  $selectdia = mysqli_query($mysqli,"SELECT namapanggilan FROM karyawan WHERE nik='$nik'");
  $datadia = mysqli_fetch_array($selectdia);
  $name = $datadia['namapanggilan'];
} elseif ($level=='2') {
  $dia=$_SESSION['nik'];
  $selectabsen = mysqli_query($mysqli,"SELECT * FROM absen_maps WHERE nik='$dia' && tanggal>='2018-03-01' GROUP BY tanggal ORDER BY tanggal, jam");
  $selectdia = mysqli_query($mysqli,"SELECT namapanggilan FROM karyawan WHERE nik='$dia'");
  $datadia = mysqli_fetch_array($selectdia);
  $name = $datadia['namapanggilan'];
}
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
      Data Absen
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Absen Lokasi</li>
      <li class="active"><?php if (! empty($nik)) echo $name; else echo 'Tabel Gaji'; ?></li>
    </ol>
  </section>

  <!-- Main content -->
    <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Absen Lokasi <?php echo $name; ?></h3>
          </div>
          <div class="col-sm-6" align="right">
          
            <a href="listabsen.php" class="btn btn-info" >Riwayat absen</a>
            <a href="testact.php?aksi=export" class="btn btn-success" >Export to Excel</a>
            <a href="testact.php?aksi=refresh&nik=<?=$_GET['nik']?>" class="btn btn-primary" >Update data absen</a>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div id="tabelpegawai_wrapper">
    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
        <thead>
      <tr>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th></th>
       
      </tr>
      </thead>
        <tbody>
      <?php
      if(! empty($tanggal)){
        while ($dataabsen = mysqli_fetch_array($selectabsen)) {
          $data1=$dataabsen['tanggal'];
          $data2=$dataabsen['nik'];
          $masuk=mysqli_query($mysqli,"SELECT jam FROM absen_maps WHERE tanggal='$data1' && nik='$data2' ORDER BY jam LIMIT 1");
          $msk=mysqli_fetch_assoc($masuk);
          $keluar=mysqli_query($mysqli,"SELECT jam FROM absen_maps WHERE tanggal='$data1' && nik='$data2' ORDER BY jam desc LIMIT 1");
          $klr=mysqli_fetch_assoc($keluar);
          $select=mysqli_query($mysqli,"SELECT namapanggilan FROM karyawan WHERE nik='$data2'");
          $nama=mysqli_fetch_array($select);
          $datang = new DateTime($msk['jam']);
          if ($datang>$batastelat) {
            $telat=$datang->diff($batastelat);
            $terlambat=$telat->format('%H:%I');
          } else {
            $terlambat="";
          }
          $idabsen=$dataabsen['idabsen_maps'];
         
         // $sanksi=$telat->format('%I') * 500;
          echo "<tr>";
          echo "<td>".$dataabsen['tanggal']."</td>";
          echo "<td>".$msk['jam']."</td>";
          
		  
          // echo "<td>".substr($dataabsen['keterangan1'], 0, 5)." - ".substr($dataabsen['keterangan1'], 9, 5)." = ".substr($dataabsen['keterangan1'], 16)."</td>";
          // echo "<td>".implode("<br>",$koma)."</td>";
          if ($level=='0' || $level=='1') {
            echo "<td><a href='tampil_map.php?id=".$idabsen."'>Lihat Lokasi</a></td>";
                }
          //echo "<td>Rp. ".number_format(,2,",",".").",-</td>";
                //echo "<td>".$dataabsen['idabsen']."</td>";
          echo "</tr>";
            
          }
        }
        ?>
      </tbody>
    </table>
    </div>
    </div>
  </section>
</div>
<!-- page script -->
<script>
  $(function () {
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>

<?php
include "footer.php"

?>
