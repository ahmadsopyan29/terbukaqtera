<?php
include "connectdb.php";
extract($_GET);

if($aksi=="tambah"){
	extract($_POST);
	$sql = "INSERT INTO `pipe_line`(`project_name`,`customer_name`,`partner_name`,`account_manager`,`et_from`,`et_until`,`period`) VALUE('".$project."','".$customer."','".$partner."','".$am."','".$etfrom."','".$etuntil."','".$period."')";

	if(mysqli_query($mysqli,$sql)){
		header("Location:datapipeline.php?hasil=Berhasil Mengajukan");
	}else{
		header("Location:datapipeline.php?hasil=Gagal Mengajukan");
	}
}