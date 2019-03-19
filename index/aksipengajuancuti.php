<?php
include "connectdb.php";

$jumlah_hari = $_POST['jumlah_hari'];
$alasan = $_POST['alasan'];
$nik = $_POST['nik'];
$selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
$datakuota = mysqli_fetch_array($selectkuota);
$kuota = $datakuota['kuota_cuti'];
$sisa_kuota = $kuota - $jumlah_hari;

$query = "SELECT max(id_pengajuan) as maxKode FROM pengajuan_cuti";
$hasil = mysqli_query($mysqli,$query);
$data = mysqli_fetch_array($hasil);
$id_pengajuan = $data['maxKode'];

$noUrut = (int) substr($id_pengajuan, 3, 3);
$noUrut++;

$char = "PC";
$id_pengajuan = $char . sprintf("%03s", $noUrut);


if($jumlah_hari == 1 ){
  $tanggal1 = $_POST['tanggal1'];

  $sql = "INSERT INTO pengajuan_cuti(id_pengajuan,nik,jumlah_hari,alasan) VALUES ('$id_pengajuan','$nik','$jumlah_hari','$alasan')";		
	if(mysqli_query($mysqli, $sql)){
    $sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
    if(mysqli_query($mysqli, $sql2)){
      $sql3 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal1')";
      if(mysqli_query($mysqli, $sql3)){
        header("Location:data_pengajuan.php?hasil=Pengajuan Berhasil Terkirim");
      }else{
        header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL3");
      }
    }else{
      header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL2");
    }
  }else{
    header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL1");
  }			

}elseif($jumlah_hari == 2 ){

  $tanggal1 = $_POST['tanggal1'];
  $tanggal2 = $_POST['tanggal2'];

  if($tanggal1 == $tanggal2){
    echo "<script language='javascript'>alert('Terdapat Input Tanggal Yang Sama Silahkan Periksa Kembali !!'); history.go(-1)</script>";
  }elseif($tanggal1 > $tanggal2){
    echo "<script language='javascript'>alert('Mohon Input Tanggal Secara Berurutan Dari Kecil ke Besar !!'); history.go(-1)</script>";
  }else{
      $sql = "INSERT INTO pengajuan_cuti(id_pengajuan,nik,jumlah_hari,alasan) VALUES ('$id_pengajuan','$nik','$jumlah_hari','$alasan')";		
      if(mysqli_query($mysqli, $sql)){
        $sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
        if(mysqli_query($mysqli, $sql2)){
          $sql3 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal1')";
          if(mysqli_query($mysqli, $sql3)){
            $sql4 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal2')";
            if(mysqli_query($mysqli, $sql4)){
              header("Location:data_pengajuan.php?hasil=Pengajuan Berhasil Terkirim");
            }else{
              header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
            }
          }else{
            header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL3");
          }
        }else{
          header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL2");
        }
      }else{
        header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL1");
      }			
  }
}elseif($jumlah_hari == 3 ){

  $tanggal1 = $_POST['tanggal1'];
  $tanggal2 = $_POST['tanggal2'];
  $tanggal3 = $_POST['tanggal3'];

  if($tanggal1 == $tanggal2 OR $tanggal1 == $tanggal3 OR $tanggal2 == $tanggal3){
    echo "<script language='javascript'>alert('Terdapat Input Tanggal Yang Sama Silahkan Periksa Kembali !!'); history.go(-1)</script>";
  }elseif($tanggal1 > $tanggal2 OR $tanggal1 > $tanggal3 OR $tanggal2 > $tanggal3){
    echo "<script language='javascript'>alert('Mohon Input Tanggal Secara Berurutan Dari Kecil ke Besar !!'); history.go(-1)</script>";
  }else{
      $sql = "INSERT INTO pengajuan_cuti(id_pengajuan,nik,jumlah_hari,alasan) VALUES ('$id_pengajuan','$nik','$jumlah_hari','$alasan')";		
      if(mysqli_query($mysqli, $sql)){
        $sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
        if(mysqli_query($mysqli, $sql2)){
          $sql3 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal1')";
          if(mysqli_query($mysqli, $sql3)){
            $sql4 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal2')";
            if(mysqli_query($mysqli, $sql4)){
              $sql5 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal3')";
              if(mysqli_query($mysqli, $sql5)){
                header("Location:data_pengajuan.php?hasil=Pengajuan Berhasil Terkirim");
              }else{
                header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
              }
            }else{
              header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
            }
          }else{
            header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL3");
          }
        }else{
          header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL2");
        }
      }else{
        header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL1");
      }			
  }
}elseif($jumlah_hari == 4 ){

  $tanggal1 = $_POST['tanggal1'];
  $tanggal2 = $_POST['tanggal2'];
  $tanggal3 = $_POST['tanggal3'];
  $tanggal4 = $_POST['tanggal4'];


  if($tanggal1 == $tanggal2 OR $tanggal1 == $tanggal3 OR $tanggal2 == $tanggal3 OR $tanggal1 == $tanggal4 OR $tanggal2 == $tanggal4 OR $tanggal3 == $tanggal4 ){
    echo "<script language='javascript'>alert('Terdapat Input Tanggal Yang Sama Silahkan Periksa Kembali !!'); history.go(-1)</script>";
  }elseif($tanggal1 > $tanggal2 OR $tanggal1 > $tanggal3 OR $tanggal2 > $tanggal3 OR $tanggal1 > $tanggal4 OR $tanggal2 > $tanggal4 OR $tanggal3 > $tanggal4){
    echo "<script language='javascript'>alert('Mohon Input Tanggal Secara Berurutan Dari Kecil ke Besar !!'); history.go(-1)</script>";
  }else{
      $sql = "INSERT INTO pengajuan_cuti(id_pengajuan,nik,jumlah_hari,alasan) VALUES ('$id_pengajuan','$nik','$jumlah_hari','$alasan')";		
      if(mysqli_query($mysqli, $sql)){
        $sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
        if(mysqli_query($mysqli, $sql2)){
          $sql3 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal1')";
          if(mysqli_query($mysqli, $sql3)){
            $sql4 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal2')";
            if(mysqli_query($mysqli, $sql4)){
              $sql5 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal3')";
              if(mysqli_query($mysqli, $sql5)){
                $sql6 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal4')";
                if(mysqli_query($mysqli, $sql6)){
                  header("Location:data_pengajuan.php?hasil=Pengajuan Berhasil Terkirim");
                }else{
                  header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
                }
              }else{
                header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
              }
            }else{
              header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
            }
          }else{
            header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL3");
          }
        }else{
          header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL2");
        }
      }else{
        header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL1");
      }			
  }
}elseif($jumlah_hari == 5 ){

  $tanggal1 = $_POST['tanggal1'];
  $tanggal2 = $_POST['tanggal2'];
  $tanggal3 = $_POST['tanggal3'];
  $tanggal4 = $_POST['tanggal4'];
  $tanggal5 = $_POST['tanggal5'];


  if($tanggal1 == $tanggal2 OR $tanggal1 == $tanggal3 OR $tanggal2 == $tanggal3 OR $tanggal1 == $tanggal4 OR $tanggal2 == $tanggal4 OR $tanggal3 == $tanggal4 
      OR $tanggal1 == $tanggal5 OR $tanggal2 == $tanggal5 OR $tanggal3 == $tanggal5 OR $tanggal4 == $tanggal5 ){
    echo "<script language='javascript'>alert('Terdapat Input Tanggal Yang Sama Silahkan Periksa Kembali !!'); history.go(-1)</script>";
  }elseif($tanggal1 > $tanggal2 OR $tanggal1 > $tanggal3 OR $tanggal2 > $tanggal3 OR $tanggal1 > $tanggal4 OR $tanggal2 > $tanggal4 OR $tanggal3 > $tanggal4
          OR $tanggal1 > $tanggal5 OR $tanggal2 > $tanggal5 OR $tanggal3 > $tanggal5 OR $tanggal4 > $tanggal5 ){
    echo "<script language='javascript'>alert('Mohon Input Tanggal Secara Berurutan Dari Kecil ke Besar !!'); history.go(-1)</script>";
  }else{
      $sql = "INSERT INTO pengajuan_cuti(id_pengajuan,nik,jumlah_hari,alasan) VALUES ('$id_pengajuan','$nik','$jumlah_hari','$alasan')";		
      if(mysqli_query($mysqli, $sql)){
        $sql2 = "UPDATE karyawan SET kuota_cuti=$sisa_kuota WHERE nik=$nik";
        if(mysqli_query($mysqli, $sql2)){
          $sql3 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal1')";
          if(mysqli_query($mysqli, $sql3)){
            $sql4 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal2')";
            if(mysqli_query($mysqli, $sql4)){
              $sql5 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal3')";
              if(mysqli_query($mysqli, $sql5)){
                $sql6 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal4')";
                if(mysqli_query($mysqli, $sql6)){
                  $sql7 = "INSERT INTO detail_pengajuan_cuti(id_pengajuan,tanggal) VALUES ('$id_pengajuan','$tanggal5')";
                  if(mysqli_query($mysqli, $sql7)){
                    header("Location:data_pengajuan.php?hasil=Pengajuan Berhasil Terkirim");
                  }else{
                    header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
                  }
                }else{
                  header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
                }
              }else{
                header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
              }
            }else{
              header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL4");
            }
          }else{
            header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL3");
          }
        }else{
          header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL2");
        }
      }else{
        header("Location:data_pengajuan.php?hasil=SQL Syntax error SQL1");
      }			
  }
}



?>