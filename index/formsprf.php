0. <?php
include "header.php";
?>
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
      <li class="">Project</li>
      <li class="active">Special Project Request Form</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <!-- /.box-header -->
    <form role="form" method="post" action="aksisprf.php?aksi=tambah" enctype='multipart/form-data'>
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-6">
		<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<h3>Request Form</h3>
			<div class="form-group">
			  <label for="namapelanggan">Customer's Name</label>
			  <input type="text" class="form-control" placeholder="Customer's Name" name="namapelanggan" required/>
			</div>
			<div class="form-group">
			  <label for="namaam">Account Manager</label>
			  <input type="text" class="form-control" placeholder="Account Manager" name="namaam" required/>
			</div>
			<div class="form-group">
			  <label for="namapartner">Partner's Name</label>
			  <input type="text" class="form-control" placeholder="Partner's Name" name="namapartner" required/>
			</div>
			<div class="form-group">
			  <label for="backgroundperusahaan">Company Background</label>
			  <textarea class="form-control" placeholder="Company Background" name="backgroundperusahaan" style="resize: none" required></textarea>
			</div>
			<div class="form-group">
			  <label for="backgroundplp">Past License Purchased Background</label>
			  <input type="text" class="form-control" placeholder="Past License Purchased Background" name="backgroundplp"/>
			</div>
			<div class="form-group">
			  <label for="cpsituation">Current Purchase Situation</label>
			  <textarea class="form-control" placeholder="Current Purchase Situation" name="cpsituation" style="resize: none"/></textarea>
			</div>
		  </div>
		  <div class="col-sm-6" style="margin-top: 56px">
			<div class="form-group">
			  <label for="excrequest">Exception Request</label>
			  <input type="text" class="form-control" placeholder="Exception Request" name="excrequest"/>
			</div>
			<div class="form-group">
			  <label for="justification">Justification</label>
			  <textarea class="form-control" placeholder="Justification" name="justification" style="resize: none"/></textarea>
			</div>
			<div class="form-group">
			  <label for="competition">Competition</label>
			  <input type="text" class="form-control" placeholder="Competition" name="competition"/>
			</div>
			<div class="form-group">
			  <label for="close">When to Close</label>
			  <input type="month" class="form-control" placeholder="When to Close" name="close"/>
			</div>
			<div class="form-group">
			  <label for="frp">Future Rev. Potensial</label>
			  <input type="text" class="form-control" placeholder="Future Rev. Potensial" name="frp"/>
			</div>
		  </div>
      	</div>
      </div>
		  
      <div class="col-sm-12">
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////// Discount History ///////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Discount History</h3>
        <div class="row discount-history">
			<div class="form-wrapper">
				<input type="hidden" class="chistory" name="chistory" value="1">
				<div class="col-sm-1" style="text-align: center">1.</div>
				<div class="col-sm-11">
					<div class="row">
						<div class="form-group col-sm-3">
						  <label for="date1">Date</label>
						  <input type="date" class="form-control" name="date1" />
						</div>
						<div class="form-group col-sm-3 pricelv">
						  <label for="pricelv1">Price Level</label>
						  <input onkeypress="return isNumber(event)" onKeyUp="priceChange($(this))" type="text" class="form-control" placeholder="Price Level" name="pricelv1" />
						</div>
						<div class="form-group col-sm-3 disclv">
						  <label for="disclv1">Discount Level (%)</label>
						  <input onkeypress="return isNumber(event)" onKeyUp="discountChange($(this))" type="text" class="form-control" placeholder="Discount Level (%)" name="disclv1" />
						</div>
						<div class="form-group col-sm-3 pricead">
						  <label for="pricead1">Price After Discount</label>
						  <input onkeypress="return isNumber(event)" onKeyUp="priceadChange($(this))" type="text" class="form-control" placeholder="Price After Discount" name="pricead1" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" style="text-align: right">
				<button type="button" class="add_history btn btn-success">Add Discount History</button>
			</div>
		</div>
		<script>
			var chistory = 1;
			$(".add_history").click(function(){
				chistory++;
				$(".discount-history").append(
					'<div class="form-wrapper">'+
						'<div class="col-sm-1" style="text-align:center">'+chistory+'.</div>'+
						'<div class="col-sm-11">'+
							'<div class="row">'+
								'<div class="form-group col-sm-3">'+
								  '<label for="date'+chistory+'">Date</label>'+
								  '<input type="date" class="form-control" name="date'+chistory+'" />'+
								'</div>'+
								'<div class="form-group col-sm-3 pricelv">'+
								  '<label for="pricelv'+chistory+'">Price Level</label>'+
								  '<input onkeypress="return isNumber(event)" onkeyup="priceChange($(this))" type="text" class="form-control" placeholder="Price Level" name="pricelv'+chistory+'" />'+
								'</div>'+
								'<div class="form-group col-sm-3 disclv">'+
								  '<label for="disclv'+chistory+'">Discount Level (%)</label>'+
								  '<input onkeypress="return isNumber(event)" onkeyup="discountChange($(this))" type="text" class="form-control" placeholder="Discount Level (%)" name="disclv'+chistory+'" />'+
								'</div>'+
								'<div class="form-group col-sm-3 pricead">'+
								  '<label for="pricead'+chistory+'">Price After Discount</label>'+
								  '<input onkeypress="return isNumber(event)" onkeyup="priceadChange($(this))" type="text" class="form-control" placeholder="Price After Discount" name="pricead'+chistory+'" />'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				);
				$(".chistory").val(chistory);
			});
			
			function priceChange(adata){
				var disclv = adata.parent().siblings('.disclv').children('input').val();
				var pricelv = adata.val();
				
				if(disclv != ""){
					adata.parent().siblings('.pricead').children('input').val(pricelv-((disclv*pricelv)/100));
				}
			}
			
			function discountChange(adata){
				var pricelv = adata.parent().siblings('.pricelv').children('input').val();
				var disclv = adata.val();
				
				if(pricelv != ""){
					adata.parent().siblings('.pricead').children('input').val(pricelv-((disclv*pricelv)/100));
				}
			}
			
			function priceadChange(adata){
				var pricead = adata.val();
				var pricelv = adata.parent().siblings('.pricelv').children('input').val();
				
				if(pricelv != ""){
					adata.parent().siblings('.disclv').children('input').val(100-((pricead/pricelv)*100));
				}
			}
		</script>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////// Rev. Impact //////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
       	<?php
			$sql = "SELECT * FROM `product`";
		  	$query = mysqli_query($mysqli, $sql);
		?>
        <h3>Revenue Impact</h3>
        <div class="row rev-impact">
			<input type="hidden" class="ctable" name="ctable" value="1">
        	<div class="form-wrapper col-sm-12">
        		<div class="row">
					<div class="col-sm-1" style="text-align: center">1.</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="form-group col-sm-12">
							  <select class="form-control select2 list-product list-product1" style="width: 100%;" onChange="changeProduct($(this))">
								<option disabled="disabled" selected="selected">--- Pilih Product ---</option>
								<?php while($product = mysqli_fetch_object($query)){
									echo '<option value="'.$product->id.'+'.$product->code.'+'.$product->price.'+'.$product->discount.'">'.$product->description.'</option>';
								} ?>
							  </select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-7" style="text-align: right">
				<button type="button" class="add-table btn btn-success">Add Product</button>
			</div>
		</div>
    	<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-product">
					<tr>
						<th style="width: 15%; text-align: center; vertical-align: middle">Product Name</th>
						<th>
							<table class="table" style="text-align: center">
								<tr><td colspan="3">Price List</td></tr>
								<tr>
									<td>Qty</td>
									<td>Price</td>
									<td>Total</td>
								</tr>
							</table>
						</th>
						<th>
							<table class="table" style="text-align: center">
								<tr><td colspan="3">Normal Discount</td></tr>
								<tr>
									<td>Qty</td>
									<td>Price</td>
									<td>Total</td>
								</tr>
							</table>
						</th>
						<th>
							<table class="table" style="text-align: center">
								<tr><td colspan="3">Requested Discount</td></tr>
								<tr>
									<td>Qty</td>
									<td>Price</td>
									<td>Total</td>
								</tr>
							</table>
						</th>
					</tr>
					<tr class="list-product1">
						<td>
							<table class="table">
								<tr>
									<td>
										<input type="text" name="pname1" class="product-name form-control" style="width: 100%; text-align: center; border: none" readonly>
										<input type="hidden" name="pcode1" class="pcode" readonly>
									</td>
								</tr>
							</table>
						</td>
						<td class="data-price">
							<table class="table">
								<tr>
									<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control"></td>
									<td class="price"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control"></td>
									<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control" total-price1></td>
								</tr>
							</table>
						</td>
						<td class="data-discount">
							<table class="table">
								<tr>
									<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control"></td>
									<td class="price"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control"></td>
									<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control total-disc1"></td>
								</tr>
							</table>
						</td>
						<td class="data-request">
							<table class="table">
								<tr>
									<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control" name="reqqty1"></td>
									<td class="price"><input type="text" onKeyUp="changePrice($(this))" style="width: 100%; text-align: center; border: none" class="form-control" name="reqprice1"></td>
									<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control total-req1"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<table class="table table-bordered table-total">
					<tr>
						<td style="width: 15%; text-align: center; vertical-align: middle">TOTAL</td>
						<td class="tot-price"><input type="text" style="width: 100%;; border: none" readonly class="form-control"></td>
						<td class="tot-discount"><input type="text" style="width: 100%; text-align: right; border: none" readonly class="form-control"></td>
						<td class="tot-request"><input type="text" style="width: 100%; text-align: right; border: none" readonly class="form-control"></td>
					</tr>
				</table>							
			</div>
		</div>
     
		<script>			
			var ctable = 1;
			$(".add-table").click(function(){
				ctable++;
				$('.rev-impact').append(
					'<div class="form-wrapper col-sm-12">'+
						'<div class="row">'+
							'<div class="col-sm-1" style="text-align: center">'+ctable+'.</div>'+
							'<div class="col-sm-6">'+
								'<div class="row">'+
									'<div class="form-group col-sm-12">'+
									  '<select class="form-control select2 list-product list-product'+ctable+'" style="width: 100%;" onChange="changeProduct($(this))">'+
										'<option disabled="disabled" selected="selected">--- Pilih Product ---</option>'+
										<?php
											$sql = "SELECT * FROM `product`";
											$query = mysqli_query($mysqli, $sql); 
											
											while($product = mysqli_fetch_object($query)){
											echo "'".'<option value="'.$product->id.'+'.$product->code.'+'.$product->price.'+'.$product->discount.'">'.$product->description."</option>'+";
										} ?>
									  '</select>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'
				);
				
				$('.table-product').append(
					'<tr class="list-product'+ctable+'">'+
						'<td>'+
							'<table class="table">'+
								'<tr>'+
									'<td><input type="text" name="pname'+ctable+'" class="product-name form-control" style="width: 100%; text-align: center; border: none" readonly><input type="hidden" name="pcode'+ctable+'" class="pcode" readonly></td>'+
								'</tr>'+
							'</table>'+
						'</td>'+
						'<td class="data-price">'+
							'<table class="table">'+
								'<tr>'+
									'<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control"></td>'+
									'<td class="price"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control"></td>'+
									'<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control" total-price'+ctable+'></td>'+
								'</tr>'+
							'</table>'+
						'</td>'+
						'<td class="data-discount">'+
							'<table class="table">'+
								'<tr>'+
									'<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control"></td>'+
									'<td class="price"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control"></td>'+
									'<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control total-disc'+ctable+'"></td>'+
								'</tr>'+
							'</table>'+
						'</td>'+
						'<td class="data-request">'+
							'<table class="table">'+
								'<tr>'+
									'<td class="qty"><input type="text" onKeyPress="return isNumber(event)" onKeyUp="changeQty($(this))" style="width: 100%; text-align: center; border: none" class="form-control" name="reqqty'+ctable+'"></td>'+
									'<td class="price"><input type="text" onKeyUp="changePrice($(this))" style="width: 100%; text-align: center; border: none" class="form-control" name="reqprice'+ctable+'"></td>'+
									'<td class="total"><input type="text" style="width: 100%; text-align: center; border: none" readonly class="form-control total-req'+ctable+'"></td>'+
								'</tr>'+
							'</table>'+
						'</td>'+
					'</tr>'
				);
				
				$(".ctable").val(ctable);
			});
			
			function changeProduct(product){
				var str = product.attr('class');
				var res = '.'+str.split(" ").pop();
				var txt = product.val().split("+");
				var disc = txt.pop();
				var price = txt.pop();
				var name = txt.pop();
				$("table").find(res).find('.pcode').val(txt);
				$("table").find(res).find('.product-name').val(name);
				$("table").find(res).find('.data-discount').find('.price').children().val(disc);
				$("table").find(res).find('.data-price').find('.price').children().val(price);
				if($("table").find(res).find('.data-price').find('.qty').children().val() != ""){
					$("table").find(res).find('.data-price').find('.total').children().val($("table").find(res).find('.data-price').find('.qty').children().val()*$("table").find(res).find('.data-price').find('.price').children().val());
				}
				if($("table").find(res).find('.data-discount').find('.qty').children().val() != ""){
					$("table").find(res).find('.data-discount').find('.total').children().val($("table").find(res).find('.data-discount').find('.qty').children().val()*$("table").find(res).find('.data-discount').find('.price').children().val());
				}
			}
			
			function changeQty(qty){
				var jumlah = qty.val();
				var price = qty.parent().siblings(".price").children().val();
				
				if(price!=""){
					qty.parent().siblings(".total").children().val(jumlah*price);
					if(qty.parent().parent().parent().parent().parent().hasClass("data-discount")){
						var total = 0;
						for(var i=1; i<ctable+1; i++){
							if($("td").find(".total-disc"+i).val() != ""){
								total = parseInt(total);
								total+=parseInt($("td").find(".total-disc"+i).val());
							}
						}

						$(".row").find(".table-total").find(".tot-discount").children().val(total);
					}
					
					if(qty.parent().parent().parent().parent().parent().hasClass("data-request")){
						var total = 0;
						for(var i=1; i<ctable+1; i++){
							if($("td").find(".total-req"+i).val() != ""){
								total = parseInt(total);
								total+=parseInt($("td").find(".total-req"+i).val());
							}
						}

						$(".row").find(".table-total").find(".tot-request").children().val(total);
					}
				}
			}
			
			function changePrice(price){
				var harga = price.val();
				var jumlah = price.parent().siblings(".qty").children().val();
				
				if(jumlah!=""){
					price.parent().siblings(".total").children().val(jumlah*harga);
					
					if(price.parent().parent().parent().parent().parent().hasClass("data-request")){
						var total = 0;
						for(var i=1; i<ctable+1; i++){
							if($("td").find(".total-req"+i).val() != ""){
								total = parseInt(total);
								total+=parseInt($("td").find(".total-req"+i).val());
							}
						}

						$(".row").find(".table-total").find(".tot-request").children().val(total);
					}
				}
			}
			
			$()
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
window.location.replace("datasprf.php");
})
</script>