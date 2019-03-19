<?php
include "connectdb.php";
extract($_POST);

if($_GET['aksi']=="Tambah"){
	$sql = "INSERT INTO `product_brand`(`name`,`description_brand`) VALUE('".$nama."','".$description.")";
	if(mysqli_query($mysqli,$sql)){
		header('Location:dataproduct.php?hasil=Berhasil menambahkan brand');
	}else{
		header('Location:dataproduct.php?hasil=Gagal menambahkan brand');
	}
}else if($_GET['aksi']=="Hapus"){
	$sql = "UPDATE `product_brand` SET `status`=0  WHERE `id`='".$_GET['product']."'";
	if(mysqli_query($mysqli,$sql)){
		header('Location:dataproduct.php?hasil=Berhasil menghapus brand');
	}else{
		header('Location:dataproduct.php?hasil=Gagal menghapus brand');
	}
}