<?php
include "header.php";
extract($_GET);
$selectijinsakit = mysqli_query($mysqli,"SELECT * FROM ijin_sakit WHERE id_ijin_sakit=$id ");
$data = mysqli_fetch_array($selectijinsakit);
?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ijin Sakit
      <small>Detail Ijin Sakit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Ijin Sakit</li>
      <li class="active">Detail Ijin Sakit</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        Detail Ijin Sakit
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksiupdatestatus_ijinsakit.php" enctype='multipart/form-data'>
    <div class="box-body">
      <div class="col-sm-6">
      <div class="form-group">
        <div class="row">
              
        <?php
            $kategori=$data['kategori'];
            if ($kategori== "0") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='kategori' value='0' checked></span><input type='text' class='form-control' value='BPJS' readonly></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='kategori' value='0' disabled></span><input type='text' class='form-control' value='BPJS' readonly></div></div>";
            if ($kategori== "1") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='kategori' value='1' checked></span><input type='text' class='form-control' value='Non BPJS' readonly></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='kategori' value='1' disabled></span><input type='text' class='form-control' value='Non BPJS' readonly></div></div>";
            
        ?>

              </div>
          
        </div>
        <div class="form-group">
          <label for="namalengkap">Dari Tanggal</label>
          <input type="hidden" name="id" value="<?php echo $data['id_ijin_sakit']; ?>"/>
          <input type="hidden" name="nik" value="<?php echo $data['nik']; ?>"/>
          <input type="date" class="form-control" name="dari" value="<?php echo $data['dari']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="namalengkap">Sampai Tanggal</label>
          <input type="date" class="form-control" name="sampai" value="<?php echo $data['sampai']; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="add1">Keterangan</label>
          <textarea class="form-control" placeholder="Keterangan" name="keterangan" style="resize: none; height: 80px" readonly><?php echo $data['keterangan']; ?></textarea>
        </div>
        
        <h3>Attachment</h3>
        <div class="form-group">
          <label for="namalengkap">Foto Surat Keterangan Dokter</label><br><br>
          <img src="../gambar/<?php echo $data['foto_skd']; ?>" alt="" width="35%"/> 
        </div>
        <div class="form-group">
          <label for="namalengkap">Foto kwitansi Pembayaran Dokter</label><br><br>
          <img src="../gambar/<?php echo $data['foto_kwitansi_dokter']; ?>" alt="" width="35%"/> 
        </div>
        <div class="form-group">
          <label for="namalengkap">Foto Resep Dokter</label><br><br>
          <img src="../gambar/<?php echo $data['foto_resep']; ?>" alt="" width="35%"/> 
        </div>
        <div class="form-group">
          <label for="namalengkap">Foto Kwitansi Resep Dokter</label><br><br>
          <img src="../gambar/<?php echo $data['foto_kwitansi_resep']; ?>" alt="" width="35%"/> 
        </div>
        <br><br><br>
        <div class="form-group">
        <div class="row">
              
        <?php
            $status=$data['status'];
            if ($status== "0") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0' checked></span><input type='text' class='form-control' value='Menunggu'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0'></span><input type='text' class='form-control' value='Menunggu'></div></div>";
            if ($status== "1") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1' checked></span><input type='text' class='form-control' value='Disetujui'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1'></span><input type='text' class='form-control' value='Disetujui'></div></div>";
            if ($status== "2") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' checked></span><input type='text' class='form-control' value='Ditolak'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' ></span><input type='text' class='form-control' value='Ditolak'></div></div>";
        ?>
                
                        
                          
                        
                  
                
                <!-- /.col-lg-6 -->
              </div>
          
        </div>
        <div class="form-group">
          <label for="add1">Pesan</label>
          <textarea class="form-control" placeholder="Keterangan" name="pesan" style="resize: none; height: 80px" required><?php echo $data['pesan']; ?></textarea>
        </div>

        
        
        
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary"> Update</button>
          
      	</div>
      </div>
      
    </div>
    </form>
  </div>
  <!-- Main content -->
  <section class="content">

  </section>
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
	
$(".btn-cancel").click(function(){
	window.location.replace("datapegawai.php");
});
</script>
