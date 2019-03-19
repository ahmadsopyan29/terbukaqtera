<?php
include "connectdb.php";
extract($_GET);
extract($_POST);

	$id = $_POST['id'];
	$id_pegawai = $_POST['id_pegawai'];
	$status = $_POST['status'];
	$pesan = $_POST['pesan'];

	$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti WHERE id_pengajuan='$id' ");
	$datapengajuan = mysqli_fetch_array($selectpengajuan);
	$nik = $datapengajuan['nik'];
	$jumlah_hari = $datapengajuan['jumlah_hari'];

	$selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
	$datakuota = mysqli_fetch_array($selectkuota);
	$kuota = $datakuota['kuota_cuti'];

	$update_jumlah = $kuota + $jumlah_hari;
	if($id_pegawai == 11111111){

				if($status == 1){
						$sql = "UPDATE pengajuan_cuti SET acc_admin = '$status', pesan = '$pesan' WHERE id_pengajuan=$id";
						if(mysqli_query($mysqli, $sql)){
							header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
						}else{
							header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
						}
				}elseif($status == 2){
						$sql = "UPDATE pengajuan_cuti SET acc_admin = '$status', pesan = '$pesan' WHERE id_pengajuan=$id";
						if(mysqli_query($mysqli, $sql)){
							$sql2 = "UPDATE karyawan SET kuota_cuti=$update_jumlah WHERE nik=$nik";
							if(mysqli_query($mysqli, $sql2)){
								header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
							}else{
								header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
							}
							
						}else{
							header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
						}
				}elseif($status == 0){
					$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
					if(mysqli_query($mysqli, $sql)){
						header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
					}else{
						header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
					}
				}
	}elseif($id_pegawai == '00000000'){


		if($status == 1){
			$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
			if(mysqli_query($mysqli, $sql)){
							$sql2 = "UPDATE karyawan SET kuota_cuti=$update_jumlah WHERE nik=$nik";
							if(mysqli_query($mysqli, $sql2)){
								header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
							}else{
								header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
							}
			}else{
				header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
			}
	}elseif($status == 2){
			$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
			if(mysqli_query($mysqli, $sql)){
				header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
			}else{
				header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
			}
	}elseif($status == 0){
		$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
		if(mysqli_query($mysqli, $sql)){
			header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
		}else{
			header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
		}
	}

	}else{

		if($status == 1){
				$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
				if(mysqli_query($mysqli, $sql)){
					header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
				}else{
					header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
				}
		}elseif($status == 2){
				$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
				if(mysqli_query($mysqli, $sql)){
					header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
				}else{
					header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
				}
		}elseif($status == 0){
			$sql = "UPDATE pengajuan_cuti SET acc_leader = '$status' WHERE id_pengajuan=$id";
			if(mysqli_query($mysqli, $sql)){
				header("Location:datapengajuan.php?nik=$nik&&hasil=Berhasil Merubah");
			}else{
				header("Location:datapengajuan.php?nik=$nik&&hasil=Gagal Merubah");
			}
		}
	}

?>