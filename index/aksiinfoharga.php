<?php
include "connectdb.php";
extract($_GET);

if($aksi=="tambah"){
	extract($_POST);
	$sql = "INSERT INTO `info_harga_`(`customer_id`,`contact_id`,`expire_offer`,`et_from`, `et_until`, `period`) VALUE('".$customer."','".$attn."','".$exp."','".$et_from."','".$et_until."','".$ps."')";

	if(mysqli_query($mysqli,$sql)){
		$sql1 = "SELECT * FROM `info_harga_` ORDER BY `id` DESC LIMIT 1";
		$query = mysqli_query($mysqli,$sql1);

		while($res = mysqli_fetch_object($query)){
			for($i=1; $i<$copsi+1; $i++){
				for($j=1; $j<$_POST['ctable'.$i]+1; $j++){
					$sql = "INSERT INTO `info_harga_products`(`product`,`qty`,`opsi`,`info_harga_id`) VALUE('".preg_replace("(\+)\w+","",$_POST["product".$j."opsi".$i])."','".$_POST["qty".$j."opsi".$i]."','".$i."','".$res->id."')";
					mysqli_query($mysqli,$sql);
				}
			}
		}

		header("Location:datainfoharga.php?hasil=Berhasil Mengajukan");
	}else{
		header("Location:datainfoharga.php?hasil=".mysqli_error($mysqli));
	}
}