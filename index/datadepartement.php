<?php
include "header.php";

extract($_GET);
$selectdept = mysqli_query($mysqli,"SELECT * FROM departement ");
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
      Data Departement
      <small>Tabel Departement</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Departement</li>
      <li class="active">Tabel Departement</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Departement</h3>
          </div>
          <div class="col-sm-6" align="right">
          
            
            <a href="testact.php?aksi=export" class="btn btn-info" >Riwayat Cuti</a>
            
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">Id</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Nama Departement</th>
          
          
          
          <th>Opsi</th>
        </tr>
        </thead><tbody>

          <?php
          $counter=0;
          while ($datadept = mysqli_fetch_array($selectdept)) {
            
              
              echo "<td>".$datadept['di_dept']."</td>";
			  
              echo "<td>".$datadept['dept']."</td>";
              
              
              // echo "<td><a data-toggle='modal' data-id='".$datakaryawan['namalengkap']."' href='#addBookDialog'>Detail</a></td>";
              echo "<td>  <a href='formkuotadept.php?aksi=Ubah&&id=".$id."'>Ubah Kuota</a>";
              
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
