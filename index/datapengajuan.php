<?php
include "header.php";

extract($_GET);
$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti WHERE nik=$nik ");
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
          
            $id = $datapengajuan['id_pengajuan'];
              echo "<td>".$id."</td>";
              echo "<td>".$datapengajuan['dari']." s.d ".$datapengajuan['sampai']."</td>";
			  
              echo "<td>".$datapengajuan['alasan']."</td>";

              if($nik_pegawai == '00000000'){

                $status = $datapengajuan['acc_direktur'];
                if ( $status == 2){
                  echo "<td><div class='form-group has-error'>
                  <label class='control-label' for='inputError'><i class='fa fa-times-circle-o'></i> Ditolak</label>
                  </div></td>
                  ";
                }elseif ( $status == 0 ){
                  echo "<td><div class='form-group has-warning'>
                  <label class='control-label' for='inputWarning'><i class='fa fa-bell-o'></i> Menunggu</label>
                  </div></td>
                  ";
                }elseif ( $status == 1 ){
                  echo "<td><div class='form-group has-success'>
                  <label class='control-label' for='inputSuccess'><i class='fa fa-check'></i> Disetujui</label>
                  </div></td>
                  ";
                }else{
                  echo "<td>-</td>";
                }
              }elseif($nik_pegawai == '11111111'){

                $status = $datapengajuan['acc_admin'];
                if ( $status == 2){
                  echo "<td><div class='form-group has-error'>
                  <label class='control-label' for='inputError'><i class='fa fa-times-circle-o'></i> Ditolak</label>
                  </div></td>
                  ";
                }elseif ( $status == 0 ){
                  echo "<td><div class='form-group has-warning'>
                  <label class='control-label' for='inputWarning'><i class='fa fa-bell-o'></i> Menunggu</label>
                  </div></td>
                  ";
                }elseif ( $status == 1 ){
                  echo "<td><div class='form-group has-success'>
                  <label class='control-label' for='inputSuccess'><i class='fa fa-check'></i> Disetujui</label>
                  </div></td>
                  ";
                }else{
                  echo "<td>-</td>";
                }
              }else{

                $status = $datapengajuan['acc_leader'];
                if ( $status == 2){
                  echo "<td><div class='form-group has-error'>
                  <label class='control-label' for='inputError'><i class='fa fa-times-circle-o'></i> Ditolak</label>
                  </div></td>
                  ";
                }elseif ( $status == 0 ){
                  echo "<td><div class='form-group has-warning'>
                  <label class='control-label' for='inputWarning'><i class='fa fa-bell-o'></i> Menunggu</label>
                  </div></td>
                  ";
                }elseif ( $status == 1 ){
                  echo "<td><div class='form-group has-success'>
                  <label class='control-label' for='inputSuccess'><i class='fa fa-check'></i> Disetujui</label>
                  </div></td>
                  ";
                }else{
                  echo "<td>-</td>";
                }
              }


              

              
                echo  "<td> <a href='formpengajuan.php?id=".$id."'>Ubah Status</a> </td>";
              
              
              
              
              
             
              
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
