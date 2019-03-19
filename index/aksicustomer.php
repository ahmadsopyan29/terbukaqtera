<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

if($aksi=="tambah"){
	$add1 = preg_replace('/[\r\n]+/', '\r\n', $add1);
	$add2 = preg_replace('/[\r\n]+/', '\r\n', $add2);
	$sql = "INSERT INTO `customer_acc`(`company_name`,`street1`,`street2`,`industry`,`date_join`,`acc_manager`) VALUE('".$nama."','".$add1."','".$add2."','".$industry."','".$join."','".$acc_manager."')";

	if(mysqli_query($mysqli,$sql)){
		$query = mysqli_query($mysqli, "SELECT * FROM `customer_acc` ORDER BY `id` DESC LIMIT 1");

		while($res = mysqli_fetch_object($query)){
			$sql = "INSERT INTO customer_contact(`customer_id`,`prefix`,`firstname`,`lastname`,`email`,`phone`,`ext`,`allow_email`,`allow_call`,`position`,`key_contact`) VALUE('".$res->id."','".$prefix."','".$fname."','".$lname."','".$email."','".$phone."','".$ext."','".$aemail."','".$acall."','".$position."','1')";
			mysqli_query($mysqli,$sql);
		}
		
		//echo mysqli_error($mysqli);
		header("Location:datacustomer.php?hasil=Berhasil Mengajukan");
	}else{
		//echo mysqli_error($mysqli);
		header("Location:datacustomer.php?hasil=Gagal Mengajukan");
	}
}else if($aksi=="hapus"){
	$sql = "UPDATE customer_acc SET status=0 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datacustomer.php?hasil=Berhasil Menghapus");
	}else{
		header("Location:datacustomer.php?hasil=Gagal Menghapus");
	}
}else if($aksi=="ubah"){
	$sql = "UPDATE customer_acc SET street1='".$add1."', street2='".$add2."', acc_manager=".$acc_manager." WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datacustomer.php?hasil=Berhasil Merubah");
	}else{
		header("Location:datacustomer.php?hasil=Gagal Merubah");
	}
}else if($aksi=="tambah kontak"){
	$sql = "INSERT INTO customer_contact(`customer_id`,`prefix`,`firstname`,`lastname`,`email`,`phone`,`ext`,`allow_email`,`allow_call`,`position`) VALUE('".$id."','".$prefix."','".$fname."','".$lname."','".$email."','".$phone."','".$ext."','".$aemail."','".$acall."','".$position."')";
	if(mysqli_query($mysqli, $sql)){
		header("Location:datacustomer.php?hasil=Berhasil Menambah Kontak");
	}else{
		header("Location:datacustomer.php?hasil=Gagal Menambah Kontak");
	}
}