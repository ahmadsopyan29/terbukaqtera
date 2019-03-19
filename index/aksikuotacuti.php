<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

	$sql = "UPDATE karyawan SET kuota_cuti=$kuota_cuti WHERE nik=$id";
	if(mysqli_query($mysqli, $sql)){
		header("Location:datakuotacuti.php?hasil=Berhasil Merubah");
	}else{
		header("Location:datakuotacuti.php?hasil=Gagal Merubah");
	}

?>