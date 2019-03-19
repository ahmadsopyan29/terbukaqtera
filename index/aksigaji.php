<?php
include "connsystem.php";
extract($_POST);
extract($_GET);
$awal=date_format(date_create($periode),"ym");
$idgaji=$awal.$nik;
$select = mysqli_query($mysqli,"SELECT * FROM penggajian WHERE idgaji = '$idgaji' OR idgaji LIKE '%$nik'");
$data = mysqli_fetch_array($select, MYSQLI_NUM);
if ($aksi=="Tambah") {
	if($data[0] > 1){
	  echo "Gaji pernah terdaftar";
	}
	else {
		$sql = "INSERT INTO penggajian(
									idgaji,
									gaji,
									tunjkedisiplinan,
									tunjtransport,
									tunjjabatan,
									tunjlain,
									incentive,
									thr,
									gajilainlain,
									jhtperusahaan,
									jkk,
									jkm,
									bpjskesehatanperusahaan,
									potunpaidleave,
									potjhtperusahaan,
									potjhtkaryawan,
									potjkk,
									potjkm,
									potbpjskesehatanperusahaan,
									potbpjskesehatankaryawan,
									potpph21,
									potpinjamankaryawan,
									potlainlain
								) VALUES(
									'$idgaji',
									'$gaji',
									'$tunjkedisiplinan',
									'$tunjtransport',
									'$tunjjabatan',
									'$tunjlain',
									'$incentive',
									'$thr',
									'$gajilainlain',
									'$jhtperusahaan',
									'$jkk',
									'$jkm',
									'$bpjskesehatanperusahaan',
									'$potunpaidleave',
									'$potjhtperusahaan',
									'$potjhtkaryawan',
									'$potjkk',
									'$potjkm',
									'$potbpjskesehatanperusahaan',
									'$potbpjskesehatankaryawan',
									'$potpph21',
									'$potpinjamankaryawan',
									'$potlainlain'
								)";
	  if(mysqli_query($mysqli, $sql)){
	  header('Location:datagaji.php?hasil=Berhasil menambah data');
		}
	    else{
	    header('Location:datagaji.php?hasil=Gagal daftar');
	  }

	}
} elseif($aksi=="Ubah") {
	$sql = "UPDATE penggajian SET
								gaji='$gaji',
								tunjkedisiplinan='$tunjkedisiplinan',
								tunjtransport='$tunjtransport',
								tunjjabatan='$tunjjabatan',
								tunjlain='$tunjlain',
								incentive='$incentive',
								thr='$thr',
								gajilainlain='$gajilainlain',
								jhtperusahaan='$jhtperusahaan',
								jkk='$jkk',
								jkm='$jkm',
								bpjskesehatanperusahaan='$bpjskesehatanperusahaan',
								potunpaidleave='$potunpaidleave',
								potjhtperusahaan='$potjhtperusahaan',
								potjhtkaryawan='$potjhtkaryawan',
								potjkk='$potjkk',
								potjkm='$potjkm',
								potbpjskesehatanperusahaan='$potbpjskesehatanperusahaan',
								potbpjskesehatankaryawan='$potbpjskesehatankaryawan',
								potpph21='$potpph21',
								potpinjamankaryawan='$potpinjamankaryawan',
								potlainlain='$potlainlain'
							WHERE idgaji='$idgaji'";
	  if(mysqli_query($mysqli, $sql)){
	  	header('Location:datagaji.php?hasil=Berhasil mengubah data');
		}
	    else{
	    header('Location:datagaji.php?hasil=Gagal mengubah data');
	  }
} elseif($aksi=="hapus") {
	$sql = "DELETE FROM penggajian WHERE idgaji='$id'";
	if(mysqli_query($mysqli, $sql)){
		header('Location:datagaji.php?hasil=Berhasil menghapus data');
		}
	    else{
	    header('Location:datagaji.php?hasil=Gagal menghapus data');
	 }
} else {
	
}
?>