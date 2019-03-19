<?php
include "header.php";

$select = mysqli_query($mysqli,"SELECT * FROM sprf WHERE id = '".$_GET['id']."'");
$data = mysqli_fetch_array($select);
$discount_hstr = mysqli_query($mysqli, "SELECT * FROM discount_history WHERE sprf_id= '".$_GET['id']."'");
$rev_impact = mysqli_query($mysqli, "SELECT *,product.discount as pdiscount, rev_impact.discount as rdiscount FROM rev_impact INNER JOIN product ON rev_impact.product = product.id WHERE sprf_id= '".$_GET['id']."'");
$privileges = mysqli_query($mysqli,"SELECT level FROM loginuser WHERE nik = '$nik'");
$level = mysqli_fetch_array($privileges);
?>
<style>
	.table-in th, .table-in td{
		text-align: center !important;
		vertical-align: middle !important;
	}
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
      Project
      <small>Special Project Request Form</small>
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
      <h3 class="box-title">Detail SPRF</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<td width="15%">Date</td>
						<td><?php $date = date_create($data['date']); echo date_format($date, "d M Y")?></td>
					</tr>
					<tr>
						<td>Customer's Name</td>
						<td><?=$data['customer_name']?></td>
					</tr>
					<tr>
						<td>Account Manager</td>
						<td><?=$data['acc_manager']?></td>
					</tr>
					<tr>
						<td>Partner's Name</td>
						<td><?=$data['partner_name']?></td>
					</tr>
					<tr height="80px">
						<td>Company Background</td>
						<td><?=$data['company_background']?></td>
					</tr>
					<tr>
						<td>Past License Purchased Background</td>
						<td><?=$data['plp_background']?></td>
					</tr>
					<tr>
						<td>Discount History</td>
						<td>
							<table class="table table-striped table-in">
								<tr>
									<th>Date</th>
									<th>Price Level</th>
									<th>Discount Level (%)</th>
								</tr>
								<?php while($hstr = mysqli_fetch_object($discount_hstr)){ ?>
								<tr>
									<td><?php $date_hstr = date_create($hstr->date); echo date_format($date_hstr, 'd M Y')?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $hstr->price_level)?></td>
									<td><?=$hstr->discount_level?> %</td>
								</tr>
								<?php } ?>
							</table>
						</td>
					</tr>
					<tr>
						<td>Current Purchase Situation</td>
						<td><?=$data['current_ps']?></td>
					</tr>
					<tr>
						<td>Exception Request</td>
						<td><?=$data['exception_request']?></td>
					</tr>
					<tr>
						<td>Justification</td>
						<td><?=$data['justification']?></td>
					</tr>
					<tr>
						<td>Competition</td>
						<td><?=$data['competition']?></td>
					</tr>
					<tr>
						<td>When to Close</td>
						<td><?php $date = date_create($data['when_to_close']); echo date_format($date, "M Y")?></td>
					</tr>
					<tr>
						<td>Future Rev. Potensial</td>
						<td><?=$data['future_rev_impact']?></td>
					</tr>
					<tr>
						<td>Revenue Impact</td>
						<td>
							<table class="table table-in">
								<tr>
									<th rowspan="2">Product Name</th>
									<th colspan="3">Price List</th>
									<th colspan="3">Normal Discount</th>
									<th colspan="3">Request Discount</th>
								</tr>
								<tr>
									<th>Qty</th>
									<th>Price</th>
									<th>Total</th>
									<th>Qty</th>
									<th>Price</th>
									<th>Total</th>
									<th>Qty</th>
									<th>Price</th>
									<th>Total</th>
								</tr>
								<?php 
								$totdis = 0;
								$totreq = 0;
								while($rev = mysqli_fetch_object($rev_impact)){
								?>
								<tr>
									<td><?=$rev->description.'<br>['.$rev->code.']'?></td>
									<td><?=$rev->qty?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->price)?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->qty*$rev->price)?></td>
									<td><?=$rev->qty?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->pdiscount)?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->qty*$rev->pdiscount)?></td>
									<td><?=$rev->qty?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->rdiscount)?></td>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $rev->qty*$rev->rdiscount)?></td>
								</tr>
								<?php 
									$totdis += $rev->qty*$rev->pdiscount;
									$totreq += $rev->qty*$rev->rdiscount;
								}
								?>
								<tr>
									<th colspan="6" style="text-align: left !important">TOTAL</th>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $totdis)?></td>
									<th colspan="2"></th>
									<td><?=preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $totreq)?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
		  	</div>
     		<div class="col-sm-12">
      			<div class="box-footer">
     				<button class="btn btn-primary btn-back">Back</button>
    		<?php if($level=='0' || $level=='1'){ ?>
     				<div class="pull-right">
						<button class="btn btn-danger btn-reject">Reject</button>
						<button class="btn btn-success btn-approve">Approve</button>
					</div>
     		<?php } ?>
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
	window.location.replace("datasprf.php");
})

$(".btn-approve").click(function(){
	//window.location.href = "dataproduct.php";
	window.location.replace("aksisprf.php?aksi=approve&&id=<?=$_GET['id']?>");
})

$(".btn-reject").click(function(){
	//window.location.href = "dataproduct.php";
	window.location.replace("aksisprf.php?aksi=reject&&id=<?=$_GET['id']?>");
})
</script>