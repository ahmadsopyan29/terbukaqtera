<?php
include "header.php";

$select = mysqli_query($mysqli,"SELECT * FROM quotation_view WHERE id=".$_GET['id']);
$data = mysqli_fetch_array($select);
$privileges = mysqli_query($mysqli,"SELECT level FROM loginuser WHERE nik = '$nik'");
$level = mysqli_fetch_array($privileges);
?>
<style>
	.table-in th{
		background-color: aqua;
	}
</style>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Quotation
      <small>Detail Quotation</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Project</li>
      <li class="active">Quotation</li>
      <li class="active">Detail Quotation</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">Project <?=$data['project_name']?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<th width="20%">Customer's Name</th>
						<td><?=$data['partner_name']?></td>
					</tr>
					<tr>
						<th>Attendance</th>
						<td><?=$data['contact_name']?></td>
					</tr>
					<tr>
						<th>Account Manager</th>
						<td><?=$data['channel_manager']?></td>
					</tr>
					<tr>
						<th>Period</th>
						<td><?=$data['period']?><?php if($data['period'] > 1) echo " Months"; else echo " Month"; ?></td>
					</tr>
					<tr>
						<th>Estimated Time</th>
						<td><?=$data['estimate_time']?></td>
					</tr>
					<tr>
						<th>Expire Offer</th>
						<td><?=date('d-m-Y', strtotime($data['expire_offer']))?></td>
					</tr>
					<?php for($opsi = 1; $opsi < $data['jumlah_opsi']+1; $opsi++){ ?>
					<tr>
						<th>Opsi <?=$opsi?></th>
						<td>
							<table class="table table-in table-bordered">
								<tr>
									<th>No</th>
									<th>Deskripsi</th>
									<th>Jumlah</th>
									<th>Harga Total</th>
								</tr>
								<?php 
								$no=1;
								$tot = 0;
								$products = mysqli_query($mysqli, "SELECT * FROM quotation_products INNER JOIN product_ ON quotation_products.product = product_.id WHERE quotation_id= '".$_GET['id']."' AND opsi ='".$opsi."'");
								while($product = mysqli_fetch_object($products)){
								?>
								<tr>
									<td style="text-align: right" width="5%"><?=$no?>. </td>
									<td width="60%"><?=$product->description.'<br>'.$product->sku?></td>
									<td style="text-align: right" width="8%"><?=$product->qty?></td>
									<td><span style="display: inline-block">Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $product->qty*$product->price)?>,00</span></td>
								</tr>
								<?php 
									$no++;
									$tot += $product->qty*$product->price;
								}
																				  
								$query = mysqli_query($mysqli, "SELECT * FROM quotation_discount_price WHERE quotation_id = ".$_GET['id']." AND opsi = ".$opsi);
								$price = mysqli_fetch_array($query);
								
								$tsd = (int)$tot-(int)$price['discount'];
								$vat = (int)$tsd*0.1;
								$gtot = (int)$tsd+(int)$vat;
								?>
								<tr>
									<td colspan="3" style="text-align: right">Sub Total :</td>
									<td><span style="display: inline-block">Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $tot)?>,00</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: right">Diskon :</td>
									<td><span style="display: inline-block">Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $price['discount'])?>,00</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: right">Total Setelah Diskon :</td>
									<td><span style="display: inline-block">Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $tsd)?>,00</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: right">VAT (10%) :</td>
									<td><span style="display: inline-block">Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $vat)?>,00</td>
								</tr>
								<tr>
									<td colspan="3" style="text-align: right"><b>Grand Total</b> :</td>
									<td><span style="display: inline-block"><b>Rp</span><span style="text-align: right; display: inline-block; width: 90%"><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $gtot)?>,00</b></td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
				</table>
		  	</div>
     		<div class="col-sm-12">
      			<div class="box-footer">
     				<div class="pull-right">
     					<button class="btn btn-primary btn-back">Back</button>
						<button class="btn btn-success btn-print">Print</button>
					</div>
				</div>
			</div>
      	</div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content">

  </section>
</div>

<?php
include "footer.php"
 ?>
<script type="text/javascript">
$(".btn-back").click(function(){
	//window.location.href = "dataproduct.php";
	window.location.replace("dataquotation.php");
})
</script>