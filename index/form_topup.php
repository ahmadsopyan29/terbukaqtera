<?php
include "header.php";
extract($_GET);
$selectkuota = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik=$nik ");
$datakuota = mysqli_fetch_array($selectkuota);
date_default_timezone_set('Asia/Jakarta');
$tgl1 = date('Y-m-d');
$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1)));
$tgl3 = date('Y-m-d', strtotime('+8 days', strtotime($tgl1)));
          

?>
<script src="../img.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengajuan Top Up
      <small>Form Pengajuan Top Up</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pengajuan Top Up</li>
      <li class="active">Form Pengajuan Top Up</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
    <p><b> Kuota Cuti Anda = <?php echo $datakuota['kuota_cuti']; ?> </b></p>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksitopup.php" enctype='multipart/form-data'>
    
    <div class="box-body">
      <div class="col-sm-6">
        <h3>Form Pengajuan Top Up</h3>
        <div class="form-group">
          <label for="nama">Dari Tanggal</label>
          <input type="hidden" name="nik" value="<?php echo $nik; ?>"/>
          <input type="date" class="form-control" name="dari"  required/>
        </div>
        <div class="form-group">
          <label for="add1">Sampai Tanggal</label>
          <input type="date" class="form-control" name="sampai" required/>
        </div>
        <div class="form-group">
          <label for="add1">Alasan Top Up</label>
          <textarea class="form-control" placeholder="Alasan Top Up" name="alasan" style="resize: none; height: 80px" required></textarea>
        </div>
		
  
		  </select>
        </div>
        
      
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary"> Ajukan Top Up</button>
          
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
window.location.replace("data_pengajuan.php");
});
</script>