<?php
include "header.php";

if(isset($_GET['sprf'])){
	$sql = "SELECT customer_name,partner_name,acc_manager FROM sprf WHERE id=".$_GET['sprf'];
	$query = mysqli_query($mysqli, $sql);
	$data = mysqli_fetch_array($query);
}
?>
<script src="../img.js"></script> 
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
      <li class="active">Form Quotation</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <!-- /.box-header -->
    <form role="form" method="post" action="aksiquotation.php?aksi=tambah" enctype='multipart/form-data'>
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-6">
		<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<h3>Form Quotation</h3>
			<!--<input type="hidden" value="<?=$_GET['id']?>" name="id">-->
			<div class="form-group">
			  <label for="project">Project</label>
			  <select class="form-control" name="project" required>
			  	<option disabled selected>-- List Project --</option>
			  	<?php $query = mysqli_query($mysqli, "SELECT * FROM customer_acc WHERE status = 1");
				while($res = mysqli_fetch_object($query)){ ?>
				<option value="<?=$res->id?>"><?=$res->company_name?></option>
				<?php } ?>
			  </select>
			</div>
			<div class="form-group">
			  <label for="project">Partner</label>
			  <select class="form-control list-customer" name="partner" required>
			  	<option disabled selected>-- List Partner --</option>
			  	<?php $query = mysqli_query($mysqli, "SELECT * FROM partner_acc WHERE status = 1");
				while($res = mysqli_fetch_object($query)){ ?>
				<option value="<?=$res->id?>"><?=$res->partner_name?></option>
				<?php } ?>
			  </select>
			</div>
			<div class="form-group">
			  <label for="attn">Attention</label>
			  <select class="form-control list-attn" name="attn" required>
			  	<option disabled selected>-- List Contact --</option>
			  </select>
			</div>
			<div class="form-group">
			  <label for="exp">Estimate Time</label>
			  <div class="row">
			  	<div class="col-sm-6">	
				  <label for="exp">From</label>
				  <input type="number" class="form-control" placeholder="Estimate Time From" name="et_from" required/>
			  	</div>
			  	<div class="col-sm-6">
				  <label for="exp">To</label>
				  <input type="number" class="form-control" placeholder="Estimate Time To" name="et_until" required/>
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label for="exp">Period Service</label>
			  <input type="number" class="form-control" placeholder="Period Service" name="ps" required/>
			</div>
			<div class="form-group">
			  <label for="exp">Expire Offer</label>
			  <input type="date" class="form-control" placeholder="Expire Offer" name="exp" required/>
			</div>
		  </div>
      	</div>
      </div>
		  
      <div class="col-sm-12">
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////// Tabel Product //////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
       	<?php
			$sql = "SELECT * FROM `product_`";
		  	$query = mysqli_query($mysqli, $sql);
		?>
        <h3>Table Product</h3>
        <div class="row table-wrapper">
			<input type="hidden" class="copsi" name="copsi" value="1">
        	<div class="col-sm-12">
        		<div class="row product-table1 product-table">
        			<input type="hidden" class="opsi" value="1">
					<input type="hidden" class="ctable" name="ctable1" value="1">
					<div class="form-wrapper col-sm-12">
						<div class="row">
							<div class="col-sm-1" style="text-align: center">1.</div>
							<div class="col-sm-11">
								<div class="row">
									<div class="form-group col-sm-7">
									  <select class="form-control select2 list-product list-product1" style="width: 100%;" onChange="changeProduct($(this))" name="product1opsi1">
										<option disabled="disabled" selected="selected">--- Pilih Product ---</option>
										<?php while($product = mysqli_fetch_object($query)){
											echo '<option value="'.$product->id.'+'.$product->sku.'+'.$product->price.'+'.$product->std_discount.'">'.$product->description.'</option>';
										} ?>
									  </select>
									  <input type="hidden" name="pp1opsi1">
									</div>
									<div class="form-group col-sm-1">
										<input type="number" class="form-control" placeholder="Qty" name="qty1opsi1">
									</div>
									<div class="form-group col-sm-4">
										<input type="number" class="form-control" placeholder="Total Price" name="price1opsi1">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12" style="text-align: right">
						<button type="button" class="add-table btn btn-success" onClick="addCol($(this))">Add Product</button>
					</div>
				</div>
        	</div>
        </div>
		<div class="row">
			<div class="form-group col-sm-12" style="text-align: right">
				<button style="width: 150px" type="button" class="add-opsi btn btn-success">Add Opsi</button>
			</div>
		</div>
     
		<script>			
			var copsi = 1;
			function addCol(btn){
				var opsi = parseInt(btn.parent().parent().siblings().children(".opsi").val());
				var ctable = parseInt(btn.parent().parent().siblings().children(".ctable").val())+1;
				btn.parent().parent().siblings(".product-table").append(
					'<div class="form-wrapper col-sm-12">'+
						'<div class="row">'+
							'<div class="col-sm-1" style="text-align: center">'+ctable+'.</div>'+
							'<div class="col-sm-11">'+
								'<div class="row">'+
									'<div class="form-group col-sm-7">'+
									  '<select class="form-control select2 list-product" style="width: 100%;" onChange="changeProduct($(this))" name="product'+ctable+'opsi'+opsi+'">'+
										'<option disabled="disabled" selected="selected">--- Pilih Product ---</option>'+
										<?php $sql = "SELECT * FROM `product_`";	$query = mysqli_query($mysqli, $sql); while($product = mysqli_fetch_object($query)){
											echo "'".'<option value="'.$product->id.'">'.$product->description."</option>'+";
										} ?>
									  '</select>'+
									  '<input type="hidden" name="pp'+ctable+'opsi'+opsi+'">'+
									'</div>'+
									'<div class="form-group col-sm-1">'+
										'<input type="number" class="form-control" placeholder="Qty" name="qty'+ctable+'opsi'+opsi+'">'+
									'</div>'+
									'<div class="form-group col-sm-4">'+
										'<input type="number" class="form-control" placeholder="Total Price" name="price'+ctable+'opsi'+opsi+'">'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				);
				
				btn.parent().parent().siblings().children(".ctable").val(ctable);
			}
			
			$(".add-opsi").click(function(){
				copsi++;
				$('.table-wrapper').append(
					'<div class="col-sm-12">'+
						'<div class="row product-table1 product-table">'+
							'<input type="hidden" class="opsi" value="'+copsi+'">'+
							'<input type="hidden" class="ctable" name="ctable'+copsi+'" value="1">'+
							'<div class="form-wrapper col-sm-12">'+
								'<div class="row">'+
									'<div class="col-sm-1" style="text-align: center">1.</div>'+
									'<div class="col-sm-11">'+
										'<div class="row">'+
											'<div class="form-group col-sm-7">'+
											  '<select class="form-control select2 list-product list-product1" style="width: 100%;" onChange="changeProduct($(this))" name="product1opsi'+copsi+'">'+
												'<option disabled="disabled" selected="selected">--- Pilih Product ---</option>'+
												<?php $sql = "SELECT * FROM `product_`";	$query = mysqli_query($mysqli, $sql); while($product = mysqli_fetch_object($query)){
													echo "'".'<option value="'.$product->id.'+'.$product->sku.'+'.$product->price.'+'.$product->std_discount.'">'.$product->description."</option>'+";
												} ?>
											  '</select>'+
									  		  '<input type="hidden" name="pp1opsi'+copsi+'">'+
											'</div>'+
											'<div class="form-group col-sm-1">'+
												'<input type="number" class="form-control" placeholder="Qty" name="qty1opsi'+copsi+'">'+
											'</div>'+
											'<div class="form-group col-sm-4">'+
												'<input type="number" class="form-control" placeholder="Total Price" name="price1opsi'+copsi+'">'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="form-group col-sm-12" style="text-align: right">'+
								'<button type="button" class="add-table btn btn-success" onClick="addCol($(this))">Add Product</button>'+
							'</div>'+
						'</div>'+
					'</div>'
				);
				
				$(".copsi").val(copsi);
			});
			
			function changeProduct(p){
				var pp = p.val().split("+");
				pp.pop();
				var price = pp.pop();
				alert(price);
				p.siblings().val(price);
			}
		</script>
      <!-- END -->
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-right">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary">Submit</button>
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
window.location.replace("dataquotation.php");
});
	
$(".list-customer").change(function(){
	$.getJSON("/tertutup/json_contact_partner.php", {id:$('.list-customer').val()}, function(result){
		$(".list-attn").empty();
		$(".list-attn").append('<option disabled selected>-- List Contact --</option>');
		$.each(result, function(index, data){
			$(".list-attn").append('<option value="'+data.id+'">'+data.nama+'</option>');
		});
	});
});
</script>