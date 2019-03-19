<?php
include "header.php";
extract($_GET);
if (empty($aksi)) {
  $aksi="Tambah";
}
?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product
      <small>Tambah Brand</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Product</li>
      <li class="active">Form Tambah Brand</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">
        <?php
      echo ''.$aksi.' product';
    if(! empty($hasil)){
        echo "<script> alert('".$hasil."');</script>";
      }
        ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksibrand.php?aksi=<?=$aksi?>" enctype='multipart/form-data'>
    <div class="box-body">
      <input type="hidden" name="aksi" <?php echo 'value="'.$aksi.'"'; ?>>
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-6">
		<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<h3>Form <?php echo $aksi;?> Brand</h3>
			<div class="form-group">
			  <label for="nama">Nama Brand</label>
			  <input type="text" class="form-control" name="nama" placeholder="Nama Brand" required <?PHP if(! empty($data)) echo ' value="'.$data['nama'].'"';?>/>
			</div>
			<div class="form-group">
			  <label for="description">Brand Description</label>
			  <input type="text" class="form-control" placeholder="Brand Description" name="description" required <?PHP if(! empty($data)) echo ' value="'.$data['description'].'" readonly';?>/>
			</div>
			<div class="box-footer pull-right">
				<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
      	</div>
      </div>
    </div>
    </form>
  </div>
  <!-- Main content -->
  <section class="content">

  </section>
</div>

<?php
include "footer.php"
 ?>
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(".btn-cancel").click(function(){
	//window.location.href = "dataproduct.php";
	window.location.replace("dataproduct.php");
})
</script>