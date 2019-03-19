<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

	$id = $_POST['id'];
	$status = $_POST['status'];

	$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_topup WHERE id_topup='$id' ");
	$datapengajuan = mysqli_fetch_array($selectpengajuan);
	$nik = $datapengajuan['nik'];
	$jumlah_hari = $datapengajuan['jumlah_hari'];

	$selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
	$datakuota = mysqli_fetch_array($selectkuota);
	$kuota = $datakuota['kuota_cuti'];

	$update_jumlah = $kuota - $jumlah_hari;

	if($status == 1){
			$sql = "UPDATE pengajuan_topup SET status = '$status', pesan = '$pesan' WHERE id_topup=$id";
			if(mysqli_query($mysqli, $sql)){
				header("Location:datatopup.php?nik=$nik&&hasil=Berhasil Merubah");
			}else{
				header("Location:datatopup.php?nik=$nik&&hasil=Gagal Merubah");
			}
	}elseif($status == 2){
			$sql = "UPDATE pengajuan_topup SET status = '$status', pesan = '$pesan' WHERE id_topup=$id";
			if(mysqli_query($mysqli, $sql)){
				$sql2 = "UPDATE karyawan SET kuota_cuti=$update_jumlah WHERE nik=$nik";
				if(mysqli_query($mysqli, $sql2)){
					header("Location:datatopup.php?nik=$nik&&hasil=Berhasil Merubah");
				}else{
					header("Location:datatopup.php?nik=$nik&&hasil=Gagal Merubah");
				}
				
			}else{
				header("Location:datatopup.php?nik=$nik&&hasil=Gagal Merubah");
			}
	}

?>