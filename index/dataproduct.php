<?php
include "header.php";
if($level=='0' || $level=='1'){
$selectproduct = mysqli_query($mysqli,"SELECT *, product_.id as pid FROM `product_` INNER JOIN `product_brand` ON `product_brand`.`id` = `product_`.`brand` WHERE `product_`.`status`=1 AND `product_brand`.`status`=1");
$selectbrand = mysqli_query($mysqli, "SELECT * FROM product_brand where status = 1");
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
      Product
      <small>Tabel Product</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Product</li>
      <li class="active">Tabel Product</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Product</h3>
          </div>
          <div class="col-sm-6" align="right">
            <a href="formproduct.php?aksi=Tambah" class="btn btn-primary" >Tambah Product</a>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" width="15%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">SKU</th>
          <th class="" width="23%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Description</th>
          <th class="" width="17%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Brand</th>
          <th class="" width="15%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Price</th>
          <th class="" width="15%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Discount Price</th>
          <th width="15%">Opsi</th>
        </tr>
      </thead>
      <tbody>

          <?php
          $counter=0;
          while ($dataproduct = mysqli_fetch_array($selectproduct)) {
			  if ($counter%2!=0) {
				echo "<tr role='row' class='odd'>";
			  } elseif ($counter%2==0) {
				echo "<tr role='row' class='even'>";
			  }
			  echo "<td>".$dataproduct['sku']."</td>";
			  echo "<td>".$dataproduct['description']."</td>";
			  echo "<td>".$dataproduct['name']."</td>";
			  echo "<td>".$dataproduct['price']."</td>";
			  echo "<td>".$dataproduct['std_discount']."</td>";
			  echo "<td>  <a href='formproduct.php?aksi=Ubah&&product=".$dataproduct['pid']."'>Ubah</a> | <a href='aksiproduct.php?aksi=Hapus&&product=".$dataproduct['pid']."' onclick='return confirm(".'"Apa anda yakin menghapus\n'.$dataproduct['description']." [".$dataproduct['sku'].'] ?"'.")'>Hapus</a></td>";
			  echo "</tr>";
			  $counter++;
            
          }
          ?></tbody>
    </table>
    </div>
    </div>
</section>

<section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Brand</h3>
          </div>
          <div class="col-sm-6" align="right">
            <a href="formbrand.php?aksi=Tambah" class="btn btn-primary" >Tambah Brand</a>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example2" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" width="5%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">No</th>
          <th class="" width="25%" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Brand</th>
	  <th class="" width="35%">Description</th>
          <th width="35%">Opsi</th>
        </tr>
      </thead>
      <tbody>

          <?php
          $counter=1;
          while ($databrand = mysqli_fetch_array($selectbrand)) {
			  if ($counter%2!=0) {
				echo "<tr role='row' class='odd'>";
			  } elseif ($counter%2==0) {
				echo "<tr role='row' class='even'>";
			  }
			  echo "<td>".$counter.".</td>";
			  echo "<td>".$databrand['name']."</td>";
			  echo "<td>".$databrand['description']."</td>";
			  echo "<td>  <a href='aksibrand.php?aksi=Hapus&&product=".$databrand['id']."' onclick='return confirm(".'"Apa anda yakin menghapus\n'.$databrand['nama'].' ?"'.")'>Hapus</a></td>";
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
    });
	  
	$('#example2').DataTable({
	  'pageLength'	: 25,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
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
