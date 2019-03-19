<?php
include "connectdb.php";

date_default_timezone_set('Asia/Jakarta');


  $tgl1 = date('Y-m-d');
  $tgl2 = date('Y-m-d', strtotime('-1 months', strtotime($tgl1)));
  $tgl3 = date('Y-m-d', strtotime('+8 days', strtotime($tgl1)));

  $kategori = $_POST['kategori'];
  $keterangan = $_POST['keterangan'];
  $nik = $_POST['nik'];

  $tanggal = $_POST['date'];
  $kalimat = $tanggal;
  $arr_kalimat = explode (", ",$kalimat);
  $jumlah = COUNT($arr_kalimat);

  $query = "SELECT max(id_ijin_sakit) as maxKode FROM ijin_sakit";
  $hasil = mysqli_query($mysqli,$query);
  $data = mysqli_fetch_array($hasil);
  $id_ijin_sakit = $data['maxKode'];

  $noUrut = (int) substr($id_ijin_sakit, 3, 3);
  $noUrut++;

  $char = "IS";
  $id_ijin_sakit = $char . sprintf("%03s", $noUrut);

   
  

  

  if(isset($_FILES['foto'])){
    $name_array = $_FILES['foto']['name'];
    $tmp_name_array = $_FILES['foto']['tmp_name'];
    
    for($i = 0; $i < count($tmp_name_array); $i++){
      $gambar0 = $_FILES['foto']['name'][0];
      $gambar1 = $_FILES['foto']['name'][1];
      $gambar2 = $_FILES['foto']['name'][2];
      $gambar3 = $_FILES['foto']['name'][3];
    
      if(move_uploaded_file($tmp_name_array[$i], "../gambar/".$name_array[$i])){
      }
    }
  }
       
  if( $jumlah == 5){
    $time1 = strtotime($arr_kalimat[0]);
    $time2 = strtotime($arr_kalimat[1]);
    $time3 = strtotime($arr_kalimat[2]);
    $time4 = strtotime($arr_kalimat[3]);
    $time5 = strtotime($arr_kalimat[4]);
  
    $waktu1 = date('Y-m-d',$time1);
    $waktu2 = date('Y-m-d',$time2);
    $waktu3 = date('Y-m-d',$time3);
    $waktu4 = date('Y-m-d',$time4);
    $waktu5 = date('Y-m-d',$time5);
    if($waktu1 < $tgl2 OR $waktu2 < $tgl2 OR $waktu3 < $tgl2 OR $waktu4 < $tgl2 OR $waktu5 < $tgl2 ){
      echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini'); history.go(-1)</script>";
    }else{
      $sql = "INSERT INTO ijin_sakit(id_ijin_sakit,nik,kategori,jumlah_hari,foto_skd,foto_kwitansi_dokter,foto_resep,foto_kwitansi_resep,keterangan) VALUES ('$id_ijin_sakit','$nik','$kategori','$jumlah','$gambar0','$gambar1','$gambar2','$gambar3','$keterangan')";
			
      if(mysqli_query($mysqli, $sql)){
        $sql1 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu1')";
        if(mysqli_query($mysqli, $sql1)){
          $sql2 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu2')";
          if(mysqli_query($mysqli, $sql2)){
            $sql3 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu3')";
            if(mysqli_query($mysqli, $sql3)){
              $sql4 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu4')";
              if(mysqli_query($mysqli, $sql4)){
                $sql5 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu5')";
                if(mysqli_query($mysqli, $sql5)){
                  header("Location:data_ijinsakit.php?hasil=Pengajuan Ijin Sakit Berhasil Terkirim");
                }else{
                  header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
                }
              }else{
                header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
              }
            }else{
              header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
            }
          }else{
            header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
          }
        }else{
          header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
        }
      }else{
        header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
      }
    }
  }elseif( $jumlah == 4){
    $time1 = strtotime($arr_kalimat[0]);
    $time2 = strtotime($arr_kalimat[1]);
    $time3 = strtotime($arr_kalimat[2]);
    $time4 = strtotime($arr_kalimat[3]);
    
  
    $waktu1 = date('Y-m-d',$time1);
    $waktu2 = date('Y-m-d',$time2);
    $waktu3 = date('Y-m-d',$time3);
    $waktu4 = date('Y-m-d',$time4);
    
    if($waktu1 < $tgl2 OR $waktu2 < $tgl2 OR $waktu3 < $tgl2 OR $waktu4 < $tgl2 ){
      echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini'); history.go(-1)</script>";
    }else{
      $sql = "INSERT INTO ijin_sakit(id_ijin_sakit,nik,kategori,jumlah_hari,foto_skd,foto_kwitansi_dokter,foto_resep,foto_kwitansi_resep,keterangan) VALUES ('$id_ijin_sakit','$nik','$kategori','$jumlah','$gambar0','$gambar1','$gambar2','$gambar3','$keterangan')";
			
      if(mysqli_query($mysqli, $sql)){
        $sql1 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu1')";
        if(mysqli_query($mysqli, $sql1)){
          $sql2 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu2')";
          if(mysqli_query($mysqli, $sql2)){
            $sql3 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu3')";
            if(mysqli_query($mysqli, $sql3)){
              $sql4 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu4')";
              if(mysqli_query($mysqli, $sql4)){
                  header("Location:data_ijinsakit.php?hasil=Pengajuan Ijin Sakit Berhasil Terkirim");
                }else{
                  header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
                }
              
            }else{
              header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
            }
          }else{
            header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
          }
        }else{
          header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
        }
      }else{
        header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
      }
    }
  
  }elseif( $jumlah == 3){
    $time1 = strtotime($arr_kalimat[0]);
    $time2 = strtotime($arr_kalimat[1]);
    $time3 = strtotime($arr_kalimat[2]);
    
  
    $waktu1 = date('Y-m-d',$time1);
    $waktu2 = date('Y-m-d',$time2);
    $waktu3 = date('Y-m-d',$time3);
    
    if($waktu1 < $tgl2 OR $waktu2 < $tgl2 OR $waktu3 < $tgl2 ){
      echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini 3'); history.go(-1)</script>";
    }else{
      $sql = "INSERT INTO ijin_sakit(id_ijin_sakit,nik,kategori,jumlah_hari,foto_skd,foto_kwitansi_dokter,foto_resep,foto_kwitansi_resep,keterangan) VALUES ('$id_ijin_sakit','$nik','$kategori','$jumlah','$gambar0','$gambar1','$gambar2','$gambar3','$keterangan')";
			
      if(mysqli_query($mysqli, $sql)){
        $sql1 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu1')";
        if(mysqli_query($mysqli, $sql1)){
          $sql2 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu2')";
          if(mysqli_query($mysqli, $sql2)){
            $sql3 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu3')";
            if(mysqli_query($mysqli, $sql3)){
              header("Location:data_ijinsakit.php?hasil=Pengajuan Ijin Sakit Berhasil Terkirim"); 
            }else{
              header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
            }
          }else{
            header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
          }
        }else{
          header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
        }
      }else{
        header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
      }
    }
  }elseif( $jumlah == 2){
    $time1 = strtotime($arr_kalimat[0]);
    $time2 = strtotime($arr_kalimat[1]);
    
  
    $waktu1 = date('Y-m-d',$time1);
    $waktu2 = date('Y-m-d',$time2);
    
    if($waktu1 < $tgl2 OR $waktu2 < $tgl2  ){
      echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini'); history.go(-1)</script>";
    }else{
      $sql = "INSERT INTO ijin_sakit(id_ijin_sakit,nik,kategori,jumlah_hari,foto_skd,foto_kwitansi_dokter,foto_resep,foto_kwitansi_resep,keterangan) VALUES ('$id_ijin_sakit','$nik','$kategori','$jumlah','$gambar0','$gambar1','$gambar2','$gambar3','$keterangan')";
			
      if(mysqli_query($mysqli, $sql)){
        $sql1 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu1')";
        if(mysqli_query($mysqli, $sql1)){
          $sql2 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu2')";
          if(mysqli_query($mysqli, $sql2)){
            header("Location:data_ijinsakit.php?hasil=Pengajuan Ijin Sakit Berhasil Terkirim"); 
          }else{
            header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
          }
        }else{
          header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
        }
      }else{
        header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
      }
    }  
  }elseif( $jumlah == 1){
    $time1 = strtotime($arr_kalimat[0]);
    
    $waktu1 = date('Y-m-d',$time1);
    
    if($waktu1 < $tgl2){
      echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini'); history.go(-1)</script>";
    }else{
      $sql = "INSERT INTO ijin_sakit(id_ijin_sakit,nik,kategori,jumlah_hari,foto_skd,foto_kwitansi_dokter,foto_resep,foto_kwitansi_resep,keterangan) VALUES ('$id_ijin_sakit','$nik','$kategori','$jumlah','$gambar0','$gambar1','$gambar2','$gambar3','$keterangan')";
			
      if(mysqli_query($mysqli, $sql)){
        $sql1 = "INSERT INTO detail_ijin_sakit(id_ijin_sakit,tanggal) VALUES ('$id_ijin_sakit','$waktu1')";
        if(mysqli_query($mysqli, $sql1)){
          
            header("Location:data_ijinsakit.php?hasil=Pengajuan Ijin Sakit Berhasil Terkirim"); 
          
        }else{
          header("Location:data_ijinsakit.php?hasil=SQL Syntax error");
        }
      
    }
  }
}
   



?>