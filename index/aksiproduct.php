<?php
include "connectdb.php";
extract($_POST);

if($_GET['aksi']=="Tambah"){
	$sql = "INSERT INTO `product_`(`sku`,`description`,`brand`,`price`,`std_discount`) VALUE('".$sku."','".$description."','".$brand."',".$price.",".$discount.")";
	if(mysqli_query($mysqli,$sql)){
		header('Location:dataproduct.php?hasil=Berhasil menambahkan data');
	}else{
		header('Location:dataproduct.php?hasil=Gagal menambahkan data');
	}
}else if($_GET['aksi']=="Ubah"){
	$sql = "UPDATE `product_` SET `price`=".$price.", `std_discount`=".$discount." WHERE `id`='".$product."'";
	if(mysqli_query($mysqli,$sql)){
		header('Location:dataproduct.php?hasil=Berhasil merubah data');
	}else{
		header('Location:dataproduct.php?hasil=Gagal merubah data');
	}
}else if($_GET['aksi']=="Hapus"){
	$sql = "UPDATE `product_` SET `status`=0  WHERE `id`='".$_GET['product']."'";
	if(mysqli_query($mysqli,$sql)){
		header('Location:dataproduct.php?hasil=Berhasil menghapus data');
	}else{
		header('Location:dataproduct.php?hasil=Gagal menghapus data');
	}
}