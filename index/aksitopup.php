<?php
include "connectdb.php";



  $dari = $_POST['dari'];
  $sampai = $_POST['sampai'];
  $alasan = $_POST['alasan'];
  $nik = $_POST['nik'];
  $dari_tanggal= date('Y-m-d', strtotime($dari));
  $sampai_tanggal= date('Y-m-d', strtotime($sampai));
  $sql_jumlah = "SELECT DATEDIFF('$sampai_tanggal','$dari_tanggal') AS hari";
  $jumlah_  = mysqli_query($mysqli,$sql_jumlah);
  $jumlah_hari  = mysqli_fetch_array($jumlah_);
  $jumlah = $jumlah_hari['hari'] + 1;

  $selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
  $datakuota = mysqli_fetch_array($selectkuota);
  $kuota = $datakuota['kuota_cuti'];

  $sisa_kuota = $kuota + $jumlah;

  if ($sampai_tanggal < $dari_tanggal)
  {
    echo "<script language='javascript'>alert('Tanggal Awal Harus Lebih Kecil Dari Tanggal Akhir'); history.go(-1)</script>";
  	}else{	
				$sql = "INSERT INTO pengajuan_topup(nik,dari,sampai,jumlah_hari,alasan) VALUES ('$nik','$dari_tanggal','$sampai_tanggal','$jumlah','$alasan')";
			
				if(mysqli_query($mysqli, $sql)){
					$sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
					if(mysqli_query($mysqli, $sql2)){
						header("Location:data_topup.php?hasil=Pengajuan Berhasil Terkirim");
					}else{
						header("Location:data_topup.php?hasil=SQL Syntax error");
					}
				}else{
					header("Location:data_topup.php?hasil=SQL Syntax error");
				}

}

?>