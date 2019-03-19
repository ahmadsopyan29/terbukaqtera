<?php
include "header.php";

$select = mysqli_query($mysqli,"SELECT * FROM customer_acc JOIN customer_industry ON customer_acc.industry = customer_industry.id JOIN karyawan_jabatan ON customer_acc.acc_manager = karyawan_jabatan.id JOIN karyawan ON karyawan_jabatan.nik = karyawan.nik WHERE customer_acc.id=".$_GET['id']);
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
      Data Customer
      <small>Detail Customer</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Customer</li>
      <li class="active">Detail Customer</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">Detail <?=$data['company_name']?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-12">
				<table class="table table-bordered">
					<tr>
						<th width="15%">Customer's Code</th>
						<td><?=$data['code'].$_GET['id']?></td>
					</tr>
					<tr>
						<th width="15%">Customer's Name</th>
						<td><?=$data['company_name']?></td>
					</tr>
					<tr>
						<th>Address 1</th>
						<td><?=nl2br($data['street1'])?></td>
					</tr>
					<tr>
						<th>Address 2</th>
						<td><?=nl2br($data['street2'])?></td>
					</tr>
					<tr>
						<th>Industry</th>
						<td><?=$data['industry_name']?></td>
					</tr>
					<tr>
						<th>Account Manager</th>
						<td><?=$data['namalengkap']?></td>
					</tr>
				</table>
		  	</div>
      	</div>
      </div>
      <div class="col-sm-12">
		  <div class="row">
		  	<h4>Contact</h4>
		  	<div class="col-sm-12">
		  		<table class="table table-bordered">
		  			<thead>
		  				<tr>
							<th width="7%" style="text-align: center">Key Contact</th>
							<th>Contact's Name</th>
							<th>E-mail</th>
							<th>Phone</th>
							<th>Ext.</th>
							<th>Allow E-mail</th>
							<th>Allow Call</th>
							<th>Position</th>
						</tr>
		  			</thead>
					<?php
						$query = mysqli_query($mysqli, "SELECT * FROM customer_contact WHERE status=1 AND customer_id = ".$_GET['id']." ORDER BY key_contact DESC");
		  				while($res = mysqli_fetch_object($query)){
					?>
					<tr>
						<td style="text-align: center"><?php if($res->key_contact==1) echo '<i class="fa fa-star" aria-hidden="true"></i>';?></td>
						<td><?php if($res->prefix==1)echo "Mr. ";else if($res->prefix==2)echo "Mrs. ";else if($res->prefix==3)echo "Miss "; echo $res->firstname." ".$res->lastname; ?></td>
						<td><?=$res->email?></td>
						<td><?=$res->phone?></td>
						<td><?=$res->ext?></td>
						<td><?php if($res->allow_email==1)echo "Yes"; else if($res->allow_email==0)echo "No"; ?></td>
						<td><?php if($res->allow_call==1)echo "Yes"; else if($res->allow_call==0)echo "No"; ?></td>
						<td><?=$res->position?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		  </div>
	  </div>
		<div class="col-sm-12">
			<div class="box-footer">
				<div class="pull-right">
					<button class="btn btn-primary btn-back">Back</button>
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
	window.location.replace("datacustomer.php");
})
</script>