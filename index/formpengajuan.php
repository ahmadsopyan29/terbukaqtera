<?php
include "header.php";
extract($_GET);
extract($_POST);
$selectpengajuan = mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti WHERE id_pengajuan='$id' ");
$datapengajuan = mysqli_fetch_array($selectpengajuan);
$dari_tanggal = $datapengajuan['dari'];
$sampai_tanggal = $datapengajuan['sampai'];
$alasan = $datapengajuan['alasan'];

?>
<script src="../img.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengajuan Cuti
      <small>Form Update Status Pengajuan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pengajuan Cuti</li>
      <li class="active">Form Update Pengajuan</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
    <h3 class="box-title">
        Update Status Pengajuan
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksiupdatestatus.php" enctype='multipart/form-data'>
    
    <div class="box-body">
      <div class="col-sm-6">
        <h3>Form Pengajuan Cuti </h3>
        <div class="form-group">
          <label for="nama">Dari Tanggal</label>
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
          <input type="hidden" name="id_pegawai" value="<?php echo $nik_pegawai; ?>"/>
          <input type="date" class="form-control" name="dari" value="<?php echo $dari_tanggal;?>" readonly/>
        </div>
        <div class="form-group">
          <label for="add1">Sampai Tanggal</label>
          <input type="date" class="form-control" name="sampai" value="<?php echo $sampai_tanggal; ?>" readonly/>
        </div>
        <div class="form-group">
          <label for="add1">Alasan Cuti</label>
          <textarea class="form-control" placeholder="Alasan Cuti" name="alasan" style="resize: none; height: 80px" readonly><?php echo $alasan; ?></textarea>
        </div>
        <div class="form-group">
        <div class="row">
          
              
        <?php

        if($nik_pegawai == '00000000'){
            $status=$datapengajuan['acc_direktur'];
            if ($status== "0") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0' checked></span><input type='text' class='form-control' value='Menunggu'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0'></span><input type='text' class='form-control' value='Menunggu'></div></div>";
            if ($status== "1") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1' checked></span><input type='text' class='form-control' value='Disetujui'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1'></span><input type='text' class='form-control' value='Disetujui'></div></div>";
            if ($status== "2") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' checked></span><input type='text' class='form-control' value='Ditolak'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' ></span><input type='text' class='form-control' value='Ditolak'></div></div>";
        }elseif($nik_pegawai == '11111111'){
            $status=$datapengajuan['acc_admin'];
            if ($status== "0") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0' checked></span><input type='text' class='form-control' value='Menunggu'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0'></span><input type='text' class='form-control' value='Menunggu'></div></div>";
            if ($status== "1") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1' checked></span><input type='text' class='form-control' value='Disetujui'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1'></span><input type='text' class='form-control' value='Disetujui'></div></div>";
            if ($status== "2") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' checked></span><input type='text' class='form-control' value='Ditolak'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' ></span><input type='text' class='form-control' value='Ditolak'></div></div>";
        }else{
            $status=$datapengajuan['acc_leader'];
            if ($status== "0") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0' checked></span><input type='text' class='form-control' value='Menunggu'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='0'></span><input type='text' class='form-control' value='Menunggu'></div></div>";
            if ($status== "1") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1' checked></span><input type='text' class='form-control' value='Disetujui'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='1'></span><input type='text' class='form-control' value='Disetujui'></div></div>";
            if ($status== "2") echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' checked></span><input type='text' class='form-control' value='Ditolak'></div></div>";
                else echo "<div class='col-lg-4'><div class='input-group'><span class='input-group-addon'><input type='radio' name='status' value='2' ></span><input type='text' class='form-control' value='Ditolak'></div></div>";
        }
        ?>
                
                        
                          
                        
                  
                
                <!-- /.col-lg-6 -->
              </div>
          
        </div>
        <?php if($nik_pegawai == '11111111'){?>
        <div class="form-group">
          <label for="add1">Pesan</label>
          <textarea class="form-control" placeholder="Keterangan" name="pesan" style="resize: none; height: 80px" required><?php echo $datapengajuan['pesan']; ?></textarea>
        </div>
        <?php }else{
          echo "<input type='hidden' name='pesan' value='-'/>";
        } ?>
  

      
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
//window.location.href = "dataproduct.php";
window.location.replace("datakuotacuti.php");
});
</script>