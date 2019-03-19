<?php
include "header.php";

extract($_GET);
$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_topup WHERE nik=$nik ");
$selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
$datakuota = mysqli_fetch_array($selectkuota);
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
      Data Pengajuan Top Up
      <small>Tabel Pengajuan Top Up</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pengajuan Top Up</li>
      <li class="active">Tabel Pengajuan Top Up</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            
            <p><b> Sisa Kuota Cuti <?php echo $datakuota['namalengkap']; ?> = <?php echo $datakuota['kuota_cuti']; ?> </b></p>
          </div>
          <div class="col-sm-6" align="right">
          
            
            
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">No</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Tanggal</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Alasan</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Status</th>
          
          
          <th>Opsi</th>
        </tr>
        </thead><tbody>

          <?php
          
          $counter=0;
          while ($datapengajuan = mysqli_fetch_array($selectpengajuan)) {
          
            $id = $datapengajuan['id_topup'];
            echo "<td>".$id."</td>";
              echo "<td>".$datapengajuan['dari']." s.d ".$datapengajuan['sampai']."</td>";
			  
              echo "<td>".$datapengajuan['alasan']."</td>";
              $status = $datapengajuan['status'];
              if ( $status == 0 ){
                echo  "<td> Menunggu </td>";
              }elseif ( $status == 1 ){
                echo "<td> Disetujui </td>";
              }elseif ( $status == 2 ){
                echo "<td> DiTolak </td>";
              }else{
                echo "<td>-</td>";
              }

              
                echo  "<td> <a href='formtopup.php?id=".$id."'>Ubah Status</a> </td>";
              
              
              
              
              
             
              
              echo "</tr>";
              $counter++;
            }
          
          ?></tbody>
    </table>
    </div>
    </div>
</section>

  
</div>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'pageLength'  : 10,
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example2').DataTable({
      'pageLength'  : 3,
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
