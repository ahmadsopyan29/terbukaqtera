<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

if($aksi=="tambah"){
	$add1 = preg_replace('/[\r\n]+/', '\r\n', $add1);
	$add2 = preg_replace('/[\r\n]+/', '\r\n', $add2);
	$sql = "INSERT INTO `partner_acc`(`partner_name`,`street1`,`street2`,`date_join`,`ch_manager`) VALUE('".$nama."','".$add1."','".$add2."','".$join."','".$ch_manager."')";

	if(mysqli_query($mysqli,$sql)){
		$query = mysqli_query($mysqli, "SELECT * FROM `partner_acc` ORDER BY `id` DESC LIMIT 1");

		while($res = mysqli_fetch_object($query)){
			$sql = "INSERT INTO customer_contact(`partner_id`,`prefix`,`firstname`,`lastname`,`email`,`phone`,`ext`,`allow_email`,`allow_call`,`position`,`key_contact`) VALUE('".$res->id."','".$prefix."','".$fname."','".$lname."','".$email."','".$phone."','".$ext."','".$aemail."','".$acall."','".$position."','1')";
			mysqli_query($mysqli,$sql);
		}

		header("Location:datapartner.php?hasil=Berhasil Mengajukan");
	}else{
		header("Location:datapartner.php?hasil=Gagal Mengajukan");
	}
}else if($aksi=="hapus"){
	$sql = "UPDATE partner_acc SET status=0 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datapartner.php?hasil=Berhasil Menghapus");
	}else{
		header("Location:datapartner.php?hasil=Gagal Menghapus");
	}
}else if($aksi=="ubah"){
	$sql = "UPDATE partner_acc SET street1='".$add1."', street2='".$add2."', ch_manager=".$ch_manager." WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header("Location:datapartner.php?hasil=Berhasil Merubah");
	}else{
		header("Location:datapartner.php?hasil=Gagal Merubah");
	}
}else if($aksi=="tambah kontak"){
	$sql = "INSERT INTO partner_contact(`partner_id`,`prefix`,`firstname`,`lastname`,`email`,`phone`,`ext`,`allow_email`,`allow_call`,`position`) VALUE('".$id."','".$prefix."','".$fname."','".$lname."','".$email."','".$phone."','".$ext."','".$aemail."','".$acall."','".$position."')";
	if(mysqli_query($mysqli, $sql)){
		header("Location:datapartner.php?hasil=Berhasil Menambah Kontak");
	}else{
		header("Location:datapartner.php?hasil=Gagal Menambah Kontak");
	}
}