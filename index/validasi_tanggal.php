<?php


date_default_timezone_set('Asia/Jakarta');

  $tanggal = $_POST['date'];
  $kalimat = $tanggal;
  $arr_kalimat = explode (", ",$kalimat);
  $jumlah = COUNT($arr_kalimat);

  $tgl1 = date('Y-m-d');
  $tgl2 = date('Y-m-d', strtotime('-1 months', strtotime($tgl1)));
  $tgl3 = date('Y-m-d', strtotime('+8 days', strtotime($tgl1)));

  
  if($jumlah > 5){
    echo "<script language='javascript'>alert('Satu Kali Pengajuan Ijin Sakit Maximal 5 Hari'); history.go(-1)</script>";
  }else{
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
        header("Location:form_ijinsakit.php?tanggal=$tanggal");
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
        header("Location:form_ijinsakit.php?tanggal=$tanggal");
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
        header("Location:form_ijinsakit.php?tanggal=$tanggal");
      }
    }elseif( $jumlah == 2){
      $time1 = strtotime($arr_kalimat[0]);
      $time2 = strtotime($arr_kalimat[1]);
      
    
      $waktu1 = date('Y-m-d',$time1);
      $waktu2 = date('Y-m-d',$time2);
      
      if($waktu1 < $tgl2 OR $waktu2 < $tgl2  ){
        echo "<script language='javascript'>alert('Pengajuan Ijin Sakit Maksimal Sebulan Dari Hari Ini'); history.go(-1)</script>";
      }else{
        header("Location:form_ijinsakit.php?tanggal=$tanggal");
      }
    }
    elseif( $jumlah == 1){
      $time1 = strtotime($arr_kalimat[0]);
      
    
      $waktu1 = date('Y-m-d',$time1);
      

      
      if($waktu1 < $tgl2){
        echo "<script language='javascript'>alert('Tanggal Tidak Valid'); history.go(-1)</script>";
      }else{
        header("Location:form_ijinsakit.php?tanggal=$tanggal");
      }
    }


  }
?>