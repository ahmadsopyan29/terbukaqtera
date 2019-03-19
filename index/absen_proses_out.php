<?php
include "connectdb.php";
include "fungsi_acak.php";
include 'header.php';
date_default_timezone_set('Asia/Jakarta');



if(isset($_POST['submit']))
{
  
  $lat   = $_POST['latitude'];
  $long   = $_POST['longitude'];
  $perusahaan   = $_POST['namaperusahaan'];
  
  $tgl = date('Y-m-d');
  $wkt = date('H:i:s');

  $file_name    = $_FILES['foto']['name']; // File adalah name dari tombol input pada form
  
  $file_tmp     = $_FILES['foto']['tmp_name'];
  $lokasi       = '../gambar_keluar/'.$file_name.'';
  $gambar = $file_name;
        
  move_uploaded_file($file_tmp, $lokasi);

  
          // Proses insert data customer
          $create = mysqli_query($mysqli, "INSERT INTO absen(

                                            idabsen,
                                            tanggal,
                                            nik,
                                            jam, 
                                            status, 
                                            perusahaan,
                                            foto,          
                                            latitude,
                                            longitude,
                                            stat)
                                    VALUES ('$us',
                                            '$tgl',
                                            '$nik',
                                            '$wkt',
                                            '1',
                                            '$perusahaan',
                                            '$gambar',
                                            '$lat',
                                            
                                            '$long',
                                            '1')");

          echo "<script>alert('Absen Berhasil, Trima Kasih !!');history.go(-1)</script>";
       
  }

?>
