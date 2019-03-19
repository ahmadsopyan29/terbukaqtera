<?php
include "header.php";

extract($_GET);
$selectijinsakit = mysqli_query($mysqli,"SELECT * FROM ijin_sakit WHERE nik=$nik ");

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
      Data Ijin Sakit
      <small>Tabel Ijin Sakit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Ijin Sakit</li>
      <li class="active">Tabel Ijin Sakit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6" align="right">
              <a href='../date/ijin_sakit.php' class='btn btn-info' > Ijin Sakit Baru</a>  
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">No</th>
          
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Status</th>
          
          <th></th>
        </tr>
        </thead><tbody>

          <?php
          
          $counter=0;
          while ($dataijinsakit = mysqli_fetch_array($selectijinsakit)) {
          
              $id = $dataijinsakit['id_ijin_sakit'];
              echo "<td>".$id."</td>";
              
              $status = $dataijinsakit['status'];
              if ( $status == 0 ){
                echo  "<td> Menunggu </td>";
              }elseif ( $status == 1 ){
                echo "<td> Disetujui </td>";
              }elseif ( $status == 2 ){
                echo "<td> DiTolak </td>";
              }else{
                echo "<td>-</td>";
              }
              

              
              echo "<td><a href='detail_ijinsakit.php?id=".$id."'>Detail</a></td>";
              
              
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
