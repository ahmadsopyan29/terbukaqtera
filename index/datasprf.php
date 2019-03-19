<?php
include "header.php";
if($level=='0' || $level=='1'){
$selectproduct = mysqli_query($mysqli,"SELECT * FROM `sprf` WHERE `status`=1");
extract($_GET);
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
      Special Project Request Form
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Project</li>
      <li class="">Special Project Request Form</li>
      <li class="active">Data SPRF</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php /*?><div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data SPRF</h3>
          </div>
          <div class="col-sm-6" align="right">
            <a href="formsprf.php?aksi=Tambah" class="btn btn-primary" >Ajukan SPRF</a>
          </div>
        </div>
      </div>
     <!-- /.box-header --> 
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" width="15%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">Date</th>
          <th class="" width="20%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Customer's Name</th>
          <th class="" width="20%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Account Manager</th>
          <th class="" width="15%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Approval Status</th>
          <th width="30%">Opsi</th>
        </tr>
      </thead>
      <tbody>

          <?php
          $counter=0;
          while ($data = mysqli_fetch_array($selectproduct)) {
			  if ($counter%2!=0) {
				echo "<tr role='row' class='odd'>";
			  } elseif ($counter%2==0) {
				echo "<tr role='row' class='even'>";
			  }
			  $date = date_create($data['date']);
			  echo "<td>".date_format($date, "d M Y")."</td>";
			  echo "<td>".$data['customer_name']."</td>";
			  echo "<td>".$data['acc_manager']."</td>";
			  if($data['approval']==0){
			  	echo "<td>Pending</td>";
			  }else if($data['approval']==1){
			  	echo "<td>Approved</td>";
			  }else if($data['approval']==2){
			  	echo "<td>Rejected</td>";
			  }
			  if($level=='0' || $level=='1'){
			  	echo "<td>  <a href='detailsprf.php?id=".$data['id']."'>Detail</a> | <a href='aksisprf.php?aksi=hapus&&id=".$data['id']."' onclick='return confirm('Are you sure?')'>Hapus</a> | <a href='formquotation.php?aksi=tambah&&id=".$data['id']."'>Buat Quotation</a></td>";
			  }else{
				  if($data['approval']==1){ 
					  echo "<td>  <a href='detailsprf.php?id=".$data['id']."'>Detail</a> | <a href='formquotation.php?aksi=tambah&&id=".$data['id']."'>Buat Quotation</a></td>";
				  }else{
					  echo "<td>  <a href='detailsprf.php?id=".$data['id']."'>Detail</a></td>";
				  }
			  }
			  echo "</tr>";
			  $counter++;
          }
          ?></tbody>
    </table>
    </div><?php */?>
    <h1 style="text-align: center">Under Construction</h1>
    </div>
</section>

</div>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
	  'pageLength'	: 25,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>

<?php
} else {
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      403
      <small>Forbidden</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Error</li>
    </ol>
  </section>
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-yellow">#403</h2>

      <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Access forbidden!</h3>

        <p>
          Unfortunately, you do not have permission to access this page.<br>
          (The request was valid, but the server is refusing action. The user might not have the necessary permissions for a resource, or may need an account of some sort).
          <!-- 
          Meanwhile, you may <a href="index.html">return to dashboard</a> or contact your webmaster if you think this is a server error. Thank you.
          -->
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<?php
}
include "footer.php"
?>
