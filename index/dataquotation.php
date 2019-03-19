<?php
include "header.php";
if($level=='0' || $level=='1'){
$quotations = mysqli_query($mysqli,"SELECT quotation_.id as id, customer_acc.company_name as project, partner_acc.partner_name as partner, karyawan.namalengkap as cm FROM quotation_ JOIN partner_acc ON quotation_.partner_id = partner_acc.id JOIN customer_acc ON quotation_.customer_id = customer_acc.id JOIN karyawan_jabatan ON partner_acc.ch_manager = karyawan_jabatan.id JOIN karyawan ON karyawan_jabatan.nik = karyawan.nik WHERE quotation_.status=1");
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
      Quotation
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Project</li>
      <li class="active">Quotation</li>
      <li class="active">Data Quotation</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Quotation</h3>
          </div>
          <div class="col-sm-6" align="right">
            <a href="formquotation.php?aksi=tambah" class="btn btn-primary" >Buat Quotation</a>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" width="20%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">Project</th>
          <th class="" width="25%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Partner's Name</th>
          <th class="" width="25%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Account Manager</th>
          <th width="30%">Opsi</th>
        </tr>
      </thead>
      <tbody>

          <?php
          $counter=0;
          while ($data = mysqli_fetch_array($quotations)) {
			  if ($counter%2!=0) {
				echo "<tr role='row' class='odd'>";
			  } elseif ($counter%2==0) {
				echo "<tr role='row' class='even'>";
			  }
			  echo "<td>".$data['project']."</td>";
			  echo "<td>".$data['partner']."</td>";
			  echo "<td>".$data['cm']."</td>";
			  echo "<td>  <a href='detailquotation.php?id=".$data['id']."'>Detail</a> | <a href='aksiquotation.php?aksi=print&&id=".$data['id']."'>Print</a></td>";
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
