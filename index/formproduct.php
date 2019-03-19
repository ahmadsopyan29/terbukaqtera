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
      <small>Tambah Product</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Product</li>
      <li class="active">Form Tambah Product</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">
        <?php
    if ($aksi=="Tambah") {
      echo ''.$aksi.' product';
    } elseif(! empty($nik) && $aksi=="Ubah"){
      $select = mysqli_query($mysqli,"SELECT * FROM product_ WHERE id = '".$product."'");
      $data = mysqli_fetch_array($select);
      $privileges = mysqli_query($mysqli,"SELECT level FROM loginuser WHERE nik = '$nik'");
      $level = mysqli_fetch_array($privileges);
      echo ''.$aksi.' Product: '.$data['description'].' ['.$data['sku'].']';
    }
    if(! empty($hasil)){
        echo "<script> alert('".$hasil."');</script>";
      }
        ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksiproduct.php?aksi=<?=$aksi?>" enctype='multipart/form-data'>
    <div class="box-body">
      <input type="hidden" name="aksi" <?php echo 'value="'.$aksi.'"'; ?>>
      <?php if($aksi=="Ubah"){ echo '<input type="hidden" name="product" value="'.$product.'">';} ?>
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-6">
		<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<h3>Form <?php echo $aksi;?> Product</h3>
			<div class="form-group">
			  <label for="sku">SKU</label>
			  <input type="text" class="form-control" name="sku" placeholder="SKU" required <?PHP if(! empty($data)) echo ' value="'.$data['sku'].'" readonly';?>/>
			</div>
			<div class="form-group">
			  <label for="description">Product Description</label>
			  <input type="text" class="form-control" placeholder="Description Product" name="description" required <?PHP if(! empty($data)) echo ' value="'.$data['description'].'" readonly';?>/>
			</div>
			<div class="form-group">
			  <label for="category">Brand</label>
			  <?php if($aksi=="Tambah"){
			  echo '<select class="form-control select2 list-product list-product1" name="brand" style="width: 100%;" onChange="changeProduct($(this))">';
				echo '<option disabled="disabled" selected="selected">--- Choose Category ---</option>';

				$query = mysqli_query($mysqli, "SELECT * FROM `product_brand` WHERE `status`=1");
				while($brand = mysqli_fetch_object($query)){
					echo '<option value="'.$brand->id.'">'.$brand->name.'</option>';
				}
			  echo '</select>';
			  }else if($aksi=="Ubah"){
				$query = mysqli_query($mysqli, "SELECT `product_brand`.`name` FROM `product_brand` INNER JOIN `product_` ON `product_brand`.`id`=`product_`.`brand` WHERE `product_`.`id`=".$product);
				while($brand = mysqli_fetch_object($query)){
					echo '<input type="text" class="form-control" value="'.$brand->name.'" required readonly>';
				}
			  }?>
			</div>
			<div class="form-group">
			  <label for="price">Price</label>
			  <input type="text" onkeypress="return isNumber(event)" class="form-control" placeholder="Price" name="price" required <?PHP if(! empty($data)) echo ' value="'.$data['price'].'"';?>/>
			</div>
			<div class="form-group">
			  <label for="discount">Standard Discount</label>
			  <input type="text" onkeypress="return isNumber(event)" class="form-control" placeholder="Discount" name="discount" style="resize: none" required <?PHP if(! empty($data)) echo ' value="'.$data['std_discount'].'"';?>>
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