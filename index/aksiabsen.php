<?php
include "connectdb.php";
extract($_POST);
extract($_GET);
$isi1 = $mulai1." - ".$selesai1." = ".$keterangan1;
if (! empty($keterangan2)) {
	$isi2 = $mulai2." - ".$selesai2." = ".$keterangan2;
} else $isi2 = '';
if (! empty($keterangan3)) {
	$isi3 = $mulai3." - ".$selesai3." = ".$keterangan3;
} else $isi3 = '';
if (! empty($keterangan4)) {
	$isi4 = $mulai4." - ".$selesai4." = ".$keterangan4;
} else $isi4 = '';
if (! empty($keterangan5)) {
	$isi5 = $mulai5." - ".$selesai5." = ".$keterangan5;
} else $isi5 = '';
if($aksi=="ubah") {
	$sql = "UPDATE absen SET keterangan1='$isi1',keterangan2='$isi2',keterangan3='$isi3',keterangan4='$isi4',keterangan5='$isi5' WHERE idabsen='$id'";
	  if(mysqli_query($mysqli, $sql)){
	  	header('Location:dataabsen.php?hasil=Berhasil merubah data');
		}
	    else{
	    header('Location:dataabsen.php?hasil=Gagal merubah data');
	  }
} elseif($aksi=="hapus") {
	$sql = "UPDATE absen SET keterangan1='',keterangan2='',keterangan3='',keterangan4='',keterangan5='' WHERE idabsen='$id'";
	if(mysqli_query($mysqli, $sql)){
		header('Location:dataabsen.php?hasil=Berhasil menghapus data');
		}
	    else{
	    header('Location:dataabsen.php?hasil=Gagal menghapus data');
	 }
} else {

}
?>