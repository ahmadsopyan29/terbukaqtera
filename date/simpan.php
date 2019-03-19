<?php 
  
  $tanggal = $_POST['date'];
  
  $kalimat = $tanggal;
  $arr_kalimat = explode (", ",$kalimat);
  $jumlah = COUNT($arr_kalimat);

  $tanggal1 = $arr_kalimat[0];
  echo "$jumlah -- $tanggal1";
    
  // array(5) {
  // [0]=> string(4) "satu" [1]=> string(3) "dua"
  // [2]=> string(4) "tiga" [3]=> string(5) "empat"
  // [4]=> string(4) "lima"
  // }
?>