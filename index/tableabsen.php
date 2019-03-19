<table border="1">
  <tr>
    <th>Tanggal</th>
    <th>NIK</th>
    <th>Nama Lengkap</th>
    <th>Masuk</th>
    <th>Keluar</th>
    <th>Terlambat</th>
    <th>Keterangan</th>
  </tr>
  <?php
  include "connectdb.php";
  $batastelat = new DateTime( '08:30:00' );
  if(isset($_GET['tanggal'])){
    $tanggal = date('Y-m', strtotime($_GET['tanggal']));
  }else{
    $tanggal = date('Y-m');
  }
  $selectabsen = mysqli_query($mysqli,"SELECT * FROM absen WHERE nik!='1' && nik!='2' && nik!='3' && nik!='123' && nik!='12312323' && tanggal<='".$tanggal."-31' && tanggal>='".$tanggal."-01' ORDER BY tanggal DESC");
    while ($dataabsen = mysqli_fetch_array($selectabsen)) {
      $data1=$dataabsen['tanggal'];
      $data2=$dataabsen['nik'];
      $masuk=mysqli_query($mysqli,"SELECT jam FROM absen WHERE tanggal='$data1' && nik='$data2' ORDER BY jam LIMIT 1");
      $msk=mysqli_fetch_assoc($masuk);
      $keluar=mysqli_query($mysqli,"SELECT jam FROM absen WHERE tanggal='$data1' && nik='$data2' ORDER BY jam desc LIMIT 1");
      $klr=mysqli_fetch_assoc($keluar);
      $select=mysqli_query($mysqli,"SELECT namalengkap FROM karyawan WHERE nik='$data2'");
      $nama=mysqli_fetch_array($select);
      $datang = new DateTime($msk['jam']);
      if ($datang>$batastelat) {
        $telat=$datang->diff($batastelat);
        $terlambat=$telat->format('%H:%I');
      } else {
        $terlambat="";
      }
      echo "<tr>";
      echo "<td>".$dataabsen['tanggal']."</td>";
      echo "<td>".$dataabsen['nik']."</td>";
      echo "<td>".$nama['namalengkap']."</td>";
      echo "<td>".$msk['jam']."</td>";
      echo "<td>".$klr['jam']."</td>";
      echo "<td>".$terlambat."</td>";
      // echo "<td>".$terlambat."</td>";
      echo "<td>";
      if ($dataabsen['keterangan1']!='') {
        echo $dataabsen['keterangan1'];
      }
      if ($dataabsen['keterangan2']!='') {
        echo "<br>".$dataabsen['keterangan2'];
      }
      if ($dataabsen['keterangan3']!='') {
        echo "<br>".$dataabsen['keterangan3'];
      }
      if ($dataabsen['keterangan4']!='') {
        echo "<br>".$dataabsen['keterangan4'];
      }
      if ($dataabsen['keterangan5']!='') {
        echo "<br>".$dataabsen['keterangan5'];
      }
      echo "</td>";
      echo "</tr>";
      }
    ?>
</table>