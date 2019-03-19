<?php
include "header.php";
extract($_GET);
$select = mysqli_query($mysqli,"SELECT * FROM absen WHERE idabsen='$id'");
$data = mysqli_fetch_array($select);
?>
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
          <h3 class="box-title">Data Keterangan Absen <?php echo $data['tanggal']; ?></h3>
        </div>
        <div class="col-sm-6" align="right">
          <a <?php echo "href='aksiabsen.php?aksi=hapus&id=".$id."'"; ?> class="btn btn-primary" >Hapus data keterangan</a>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksiabsen.php" enctype='multipart/form-data'>
      <input type="hidden" name="id" <?PHP if(! empty($id)) echo ' value="'.$id.'"';?>>
      <input type="hidden" name="aksi" <?PHP if(! empty($aksi)) echo ' value="'.$aksi.'"';?>>
      <div class="box-body">
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Keterangan 1 /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Keterangan 1</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="mulai1">Waktu Mulai</label>
              <input type="time" class="form-control" placeholder="Waktu Mulai" name="mulai1" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan1'], 0, 5).'"';?>>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="selesai1">Waktu Selesai</label>
              <input type="time" class="form-control" placeholder="Waktu Selesai" name="selesai1" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan1'], 8, 5).'"';?>>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan1">Keterangan</label>
          <input type="text" class="form-control" placeholder="Keterangan" name="keterangan1" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan1'], 16).'"';?>>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Keterangan 2 /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Keterangan 2</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="mulai2">Waktu Mulai</label>
              <input type="time" class="form-control" placeholder="Waktu Mulai" name="mulai2" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan2'], 0, 5).'"';?>>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="selesai2">Waktu Selesai</label>
              <input type="time" class="form-control" placeholder="Waktu Selesai" name="selesai2" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan2'], 8, 5).'"';?>>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan2">Keterangan</label>
          <input type="text" class="form-control" placeholder="Keterangan" name="keterangan2" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan2'], 16).'"';?>>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Keterangan 3 /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Keterangan 3</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="mulai3">Waktu Mulai</label>
              <input type="time" class="form-control" placeholder="Waktu Mulai" name="mulai3" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan3'], 0, 5).'"';?>>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="selesai3">Waktu Selesai</label>
              <input type="time" class="form-control" placeholder="Waktu Selesai" name="selesai3" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan3'], 8, 5).'"';?>>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan3">Keterangan</label>
          <input type="text" class="form-control" placeholder="Keterangan" name="keterangan3" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan3'], 16).'"';?>>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Keterangan 4 /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Keterangan 4</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="mulai4">Waktu Mulai</label>
              <input type="time" class="form-control" placeholder="Waktu Mulai" name="mulai4" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan4'], 0, 5).'"';?>>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="selesai4">Waktu Selesai</label>
              <input type="time" class="form-control" placeholder="Waktu Selesai" name="selesai4" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan4'], 8, 5).'"';?>>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan4">Keterangan</label>
          <input type="text" class="form-control" placeholder="Keterangan" name="keterangan4" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan4'], 16).'"';?>>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////// Keterangan 5 /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Keterangan 5</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="mulai5">Waktu Mulai</label>
              <input type="time" class="form-control" placeholder="Waktu Mulai" name="mulai5" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan5'], 0, 5).'"';?>>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="selesai5">Waktu Selesai</label>
              <input type="time" class="form-control" placeholder="Waktu Selesai" name="selesai5" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan5'], 8, 5).'"';?>>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="keterangan5">Keterangan</label>
          <input type="text" class="form-control" placeholder="Keterangan" name="keterangan5" <?PHP if(! empty($aksi)) echo ' value="'.substr($data['keterangan5'], 16).'"';?>>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      <!-- END -->
      </div>
    </div>
    </form>
  </div>
  <!-- Main content -->
</div>

<?php
include "footer.php"
 ?>
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>