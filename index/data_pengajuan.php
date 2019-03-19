<?php
include "header.php";

extract($_GET);
$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti a JOIN detail_pengajuan_cuti b ON a.id_pengajuan = b.id_pengajuan WHERE nik=$nik GROUP BY a.id_pengajuan");
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
      Data Pengajuan Cuti
      <small>Tabel Pengajuan Cuti</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pengajuan Cuti</li>
      <li class="active">Tabel Pengajuan Cuti</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            
            <p><b> Kuota Cuti Anda = <?php echo $datakuota['kuota_cuti']; ?> </b></p>
          </div>
          <div class="col-sm-6" align="right">
          
            <?php 
            
              if ($datakuota['kuota_cuti'] != 0 ){
                  echo "<a href='form_pengajuan.php' class='btn btn-info' > Pengajuan Cuti Baru</a>";
              }else{
                echo "";
              }
              ?>
            
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">ID</th>
          
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Status</th>
         
          <th></th>
        </tr>
        </thead><tbody>

          <?php
          
          $counter=0;
          while ($datapengajuan = mysqli_fetch_array($selectpengajuan)) {
            $acc_dir = $datapengajuan['acc_direktur'];
            $acc_gm = $datapengajuan['acc_gm'];
            $acc_lead = $datapengajuan['acc_leader'];
          
            $id = $datapengajuan['id_pengajuan'];
            echo "<td>".$id."</td>";
              
			  
             
              
              if ( $acc_dir == 2 OR $acc_gm == 2 OR $acc_lead == 2){
                echo "<td><div class='form-group has-error'>
                <label class='control-label' for='inputError'><i class='fa fa-times-circle-o'></i> Ditolak</label>
                </div></td>
                ";
              }elseif ( $acc_dir == 0 OR $acc_gm == 0 OR $acc_lead == 0 ){
                echo "<td><div class='form-group has-warning'>
                <label class='control-label' for='inputWarning'><i class='fa fa-bell-o'></i> Menunggu</label>
                </div></td>
                ";
              }elseif ( $acc_dir == 1 AND $acc_gm == 1 AND $acc_lead == 1 ){
                echo "<td><div class='form-group has-success'>
                <label class='control-label' for='inputSuccess'><i class='fa fa-check'></i> Disetujui</label>
                </div></td>
                ";
              }else{
                echo "<td>-</td>";
              }
              
              echo "<td><a href='detail_pengajuan.php?id=".$id."'>Detail</a></td>";
              
              
              
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
