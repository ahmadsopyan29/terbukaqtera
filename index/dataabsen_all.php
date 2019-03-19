<?php
include "header.php";

extract($_GET);
extract($_POST);

  $selectabsen = mysqli_query($mysqli,"SELECT * FROM absen WHERE nik='$nik' AND tanggal='$tanggal' ORDER BY jam ASC");
  

?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Absen
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Absen</li>
      <li class="active"><?php if (! empty($nik)) echo $name; else echo 'Tabel Gaji'; ?></li>
    </ol>
  </section>

  <!-- Main content -->
    <section class="content">
    
    <div class="box">
    
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Absen <?php echo $name; ?></h3>
          </div>
          <div class="col-sm-6" align="right">
          
            <a href="listabsen.php" class="btn btn-info" >Riwayat absen</a>
            <a href="testact.php?aksi=export" class="btn btn-success" >Export to Excel</a>
            <a href="testact.php?aksi=refresh&nik=<?=$_GET['nik']?>" class="btn btn-primary" >Update data absen</a>
          </div>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div id="tabelpegawai_wrapper">
    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
        <thead>
      <tr>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Status In / Out</th>
        <th>Status Absen</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        
        <th></th>
      </tr>
      </thead>
        <tbody>
      <?php
      if(! empty($tanggal)){
        while ($dataabsen = mysqli_fetch_array($selectabsen)) {
          
         
         // $sanksi=$telat->format('%I') * 500;
          echo "<tr>";
          echo "<td>".$dataabsen['tanggal']."</td>";
          echo "<td>".$dataabsen['jam']."</td>";
          
          $status2 = $dataabsen['status'];
          if ( $status2 == 1 ){
            echo  "<td> Out </td>";
          }elseif ( $status2 == 0 ){
            echo "<td> In </td>";
          }else{
            echo "<td>-</td>";
          }

          $status1 = $dataabsen['stat'];
          if ( $status1 == 1 ){
            echo  "<td> Lokasi </td>";
          }elseif ( $status1 == 0 ){
            echo "<td> Finger </td>";
          }else{
            echo "<td>-</td>";
          }

          

          

          $idabsen = $dataabsen['idabsen'];
          if ( $status1 == 1 ){
            echo  "<td><a href='tampil_map.php?id=".$idabsen."'>Lihat Lokasi Dan Foto</a></td>";
          }else{
            echo "<td>-</td>";
          }


           
          echo "<td>".$dataabsen['keterangan']."</td>";
		  
          
          //echo "<td>Rp. ".number_format(,2,",",".").",-</td>";
                //echo "<td>".$dataabsen['idabsen']."</td>";
          echo "</tr>";
            
          }
        }
        ?>
      </tbody>
    </table>
    </div>
    </div>
  </section>
</div>
<!-- page script -->
<script>
  $(function () {
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  </script>

<?php
include "footer.php"

?>
