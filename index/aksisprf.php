<?php
include "connectdb.php";
extract($_GET);

if($aksi=="tambah"){
	extract($_POST);
	$sql = "INSERT INTO `sprf`(`customer_name`,`acc_manager`,`partner_name`,`company_background`,`plp_background`,`current_ps`,`exception_request`,`justification`,`competition`,`when_to_close`,`future_rev_impact`) VALUE('".$namapelanggan."','".$namaam."','".$namapartner."','".$backgroundperusahaan."','".$backgroundplp."','".$cpsituation."','".$excrequest."','".$justification."','".$competition."','".$close."-01','".$frp."')";

	if(mysqli_query($mysqli,$sql)){
		$sql1 = "SELECT * FROM `sprf` ORDER BY `id` DESC LIMIT 1";
		$query = mysqli_query($mysqli,$sql1);

		while($res = mysqli_fetch_object($query)){
			for($i=1; $i<$chistory+1; $i++){
				$sql = "INSERT INTO `discount_history`(`date`,`price_level`,`discount_level`,`sprf_id`) VALUE('".$_POST["date".$i]."','".$_POST["pricelv".$i]."','".$_POST["disclv".$i]."','".$res->id."')";
				mysqli_query($mysqli,$sql);

			}

			for($i=1; $i<$ctable+1; $i++){
				$sql = "INSERT INTO `rev_impact`(`product`,`qty`,`discount`,`sprf_id`) VALUE('".$_POST["pcode".$i]."','".$_POST["reqqty".$i]."','".$_POST["reqprice".$i]."','".$res->id."')";
				mysqli_query($mysqli,$sql);
			}
		}

		header("Location:datasprf.php?hasil=Berhasil Mengajukan");
	}else{
		header("Location:datasprf.php?hasil=Gagal Mengajukan");
	}
}else if($aksi=="hapus"){
	$sql = "UPDATE sprf SET status=0 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datasprf.php?hasil=Berhasil Menghapus");
	}else{
		header("Location:datasprf.php?hasil=Gagal Menghapus");
	}
}else if($aksi=="approve"){
	$sql = "UPDATE sprf SET approval=1 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datasprf.php?hasil=Berhasil Melakukan Approve SPRF");
	}else{
		header("Location:datasprf.php?hasil=Gagal Melakukan Approve SPRF");
	}
}else if($aksi=="reject"){
	$sql = "UPDATE sprf SET approval=2 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datasprf.php?hasil=Berhasil Melakukan Reject SPRF");
	}else{
		header("Location:datasprf.php?hasil=Gagal Melakukan Reject SPRF");
	}
}