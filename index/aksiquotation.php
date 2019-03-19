<?php
include "connectdb.php";
extract($_GET);

if($aksi=="tambah"){
	extract($_POST);
	$sql = "INSERT INTO `quotation_`(`customer_id`,`partner_id`,`contact_id`,`expire_offer`,`et_from`, `et_until`, `period`) VALUE('".$project."','".$partner."','".$attn."','".$exp."','".$et_from."','".$et_until."','".$ps."')";

	if(mysqli_query($mysqli,$sql)){
		$sql1 = "SELECT * FROM `quotation_` ORDER BY `id` DESC LIMIT 1";
		$query = mysqli_query($mysqli,$sql1);

		while($res = mysqli_fetch_object($query)){
			for($i=1; $i<$copsi+1; $i++){
				$pricep = 0;
				$discountp = 0;
				for($j=1; $j<$_POST['ctable'.$i]+1; $j++){
					$sql = "INSERT INTO `quotation_products`(`product`,`qty`,`opsi`,`quotation_id`) VALUE('".preg_replace("~(\+)\w+~","",$_POST["product".$j."opsi".$i])."','".$_POST["qty".$j."opsi".$i]."','".$i."','".$res->id."')";
					mysqli_query($mysqli,$sql);
					
					$pricep += (int)((int)($_POST["qty".$j."opsi".$i])*(int)($_POST["pp".$j."opsi".$i]));
					$discountp += (int)($_POST['price'.$j.'opsi'.$i]);
				}
				$discount = $pricep - $discountp;
				mysqli_query($mysqli, "INSERT INTO `quotation_discount_price`(`quotation_id`,`opsi`,`discount`) VALUE('".$res->id."','".$i."','".$discount."')");
			}
		}
		
		header("Location:dataquotation.php?hasil=Berhasil Mengajukan");
	}else{
		header("Location:dataquotation.php?hasil=Gagal Mengajukan");
	}
}