<?php
include "header.php";
if($level=='0' || $level=='1'){
$selectkaryawan = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE aktif='1'");
$selectkaryawanlain = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE aktif!='1'");
$selectabsen = mysqli_query($mysqli,"SELECT * FROM absen");
extract($_GET);
if(! empty($hasil)){
  echo "<script> alert('".$hasil."');</script>";
}
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pegawai
      <small>Tabel Pegawai</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pegawai</li>
      <li class="active">Tabel Pegawai</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="box-title">Data Pegawai Aktif</h3>
          </div>
          <?php if($level=='0'){ ?>
          <div class="col-sm-4" align="right">
            <a href="list_jabatan.php" class="btn btn-primary" >List Jabatan</a>
          </div>
          <div class="col-sm-2" align="right">
            <a href="formpegawai.php?aksi=Tambah" class="btn btn-primary" >Tambah Karyawan</a>
          </div>
          <?php }else if($level!='2'){ ?>
          <div class="col-sm-6" align="right">
            <a href="formpegawai.php?aksi=Tambah" class="btn btn-primary" >Tambah Karyawan</a>
          </div>
          <?php } ?>
        </div>
      </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">NIK</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Nama</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Posisi</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">E-mail</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">No. HP</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Alamat</th>
          <th>Opsi</th>
        </tr>
        </thead><tbody>

          <?php
          $counter=0;
          while ($datakaryawan = mysqli_fetch_array($selectkaryawan)) {
            if ($datakaryawan['nik']=='00000000'||$datakaryawan['nik']=='11111111') {
              # code...
            } else {
              if ($counter%2!=0) {
                echo "<tr role='row' class='odd'>";
              } elseif ($counter%2==0) {
                echo "<tr role='row' class='even'>";
              }
              echo "<td>".$datakaryawan['nik']."</td>";
              echo "<td>".$datakaryawan['namalengkap']."</td>";
			  $query = mysqli_query($mysqli, "SELECT list_jabatan.position as posisi FROM karyawan_jabatan INNER JOIN list_jabatan ON karyawan_jabatan.position = list_jabatan.id WHERE nik=".$datakaryawan['nik']." AND list_jabatan.status=1");
			  if(mysqli_num_rows($query)!=0){
				  while($posisi = mysqli_fetch_array($query)){
					  echo "<td>".$posisi['posisi']."</td>";
				  }
			  }else{
				 echo "<td></td>"; 
			  }
              echo "<td>".$datakaryawan['email']."</td>";
              echo "<td>".$datakaryawan['nohp']."</td>";
              echo "<td>".$datakaryawan['alamat']."</td>";
              // echo "<td><a data-toggle='modal' data-id='".$datakaryawan['namalengkap']."' href='#addBookDialog'>Detail</a></td>";
              echo "<td>  <a href='formpegawai.php?aksi=Ubah&&nik=".$datakaryawan['nik']."'>Ubah</a> |
              <a href='testact.php?aksi=hapus&&nik=".$datakaryawan['nik']."' ";?>onclick="return confirm('Are you sure?')">Hapus</a> | <a href="testact.php?aksi=nonaktif&&nik='<?php echo $datakaryawan['nik'];?>'">Non-aktif</a> <!-- <a href="datagaji.php?nik=<?php echo $datakaryawan['nik'];?>">Gaji</a> -->| <a href="formposisi.php?nik=<?php echo $datakaryawan['nik'];?>">Ubah Posisi</a></td>
              <?php
              echo "</tr>";
              $counter++;
            }
          }
          ?></tbody>
    </table>
    </div>
    </div>
</section>

  <section class="content">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pegawai Non-aktif</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <table id="example2" class="table table-bordered table-hover" role="grid" aria-describedby="tabelpegawai_info">
      <thead>
        <tr role="row">
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-sort="ascending" aria-label="activate to sort column ascending">NIK</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Nama</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">E-mail</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">No. HP</th>
          <th class="" tabindex="0" aria-controls="tabelpegawai" rowspan="1" colspan="1" aria-label="activate to sort column ascending">Alamat</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $counter=0;
        while ($datakaryawanlain = mysqli_fetch_array($selectkaryawanlain)) {
        if ($counter%2!=0) {
            echo "<tr role='row' class='odd'>";
        } elseif ($counter%2==0) {
          echo "<tr role='row' class='even'>";
        }
          echo "<td>".$datakaryawanlain['nik']."</td>";
          echo "<td>".$datakaryawanlain['namalengkap']."</td>";
          echo "<td>".$datakaryawanlain['email']."</td>";
          echo "<td>".$datakaryawanlain['nohp']."</td>";
          echo "<td>".$datakaryawanlain['alamat']."</td>";
          echo "<td>  <a href='formpegawai.php?aksi=Ubah&&nik=".$datakaryawanlain['nik']."'>Ubah</a> |
            <a href='testact.php?aksi=hapus&&nik=".$datakaryawanlain['nik']."' ";?>onclick="return confirm('Are you sure?')">Hapus</a> |
            <?php
            echo "<a href='testact.php?aksi=aktif&&nik=".$datakaryawanlain['nik']."'>Aktif</a></td>";
            echo "</tr>";
            $counter++;
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
    $('#example1').DataTable({
      'pageLength'  : 10,
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example2').DataTable({
      'pageLength'  : 3,
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
} else {
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      403
      <small>Forbidden</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Error</li>
    </ol>
  </section>
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-yellow">#403</h2>

      <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Access forbidden!</h3>

        <p>
          Unfortunately, you do not have permission to access this page.<br>
          (The request was valid, but the server is refusing action. The user might not have the necessary permissions for a resource, or may need an account of some sort).
          <!-- 
          Meanwhile, you may <a href="index.html">return to dashboard</a> or contact your webmaster if you think this is a server error. Thank you.
          -->
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  <!-- /.content -->
</div>
<?php
}
include "footer.php"
?>
