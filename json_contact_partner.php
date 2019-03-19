<?php

include "index/connectdb.php";
$responses = array();

if($_GET != null){
	$sql = "SELECT * FROM partner_contact WHERE partner_id = ".$_GET['id']." AND status = 1";
	$query = mysqli_query($mysqli, $sql);

	if($query){
		$data = array();
		while($res = mysqli_fetch_object($query)){
			$data['id'] = $res->id;
			if($res->prefix == 1){
				$prefix = "Mr.";
			}else if($res->prefix == 2){
				$prefix = "Mrs.";
			}else if($res->prefix == 3){
				$prefix = "Miss";
			}
			$data['nama'] = $prefix." ".$res->firstname." ".$res->lastname;

			array_push($responses, $data);
		}	
	}else{
		$responses['sukses'] = 2;
		$responses['pesan'] = "Gagal Memanggil Data!!";
	}
}else{
	$responses['sukses'] = 0;
	$responses['pesan'] = "Data tidak lengkap!!";
}

echo json_encode($responses);