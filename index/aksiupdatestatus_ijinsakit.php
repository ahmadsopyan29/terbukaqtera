<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

	$id = $_POST['id'];
	$status = $_POST['status'];
	$pesan = $_POST['pesan'];

	
			$sql = "UPDATE ijin_sakit SET status = '$status', pesan = '$pesan' WHERE id_ijin_sakit=$id";
			if(mysqli_query($mysqli, $sql)){
				header("Location:dataijinsakit.php?nik=$nik&&hasil=Berhasil Merubah");
			}else{
				header("Location:dataijinsakit.php?nik=$nik&&hasil=Gagal Merubah");
			}
	

?>