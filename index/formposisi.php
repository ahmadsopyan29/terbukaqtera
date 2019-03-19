<?php
include "header.php";

if(isset($_GET['nik'])){
	$sql = "SELECT *, karyawan_jabatan.position as jid FROM karyawan_jabatan JOIN karyawan ON karyawan.nik = karyawan_jabatan.nik JOIN list_jabatan ON karyawan_jabatan.position = list_jabatan.id WHERE karyawan_jabatan.nik=".$_GET['nik'];
	$query = mysqli_query($mysqli, $sql);
	$q = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE nik=".$_GET['nik']);
	$k = mysqli_fetch_array($q);
	if(mysqli_num_rows($query)!=0){
		$data = mysqli_fetch_array($query);
		$aksi = 'ubahposisi';
	}else{
		$aksi = 'tambahposisi';
	}	
}
?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pegawai
      <small>Ubah Posisi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pegawai</li>
      <li class="active">Ubah Posisi</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <!-- /.box-header -->
    <form role="form" method="post" action="testact.php?aksi=<?=$aksi?>" enctype='multipart/form-data'>
    <div class="box-body">
      <div class="col-sm-12">
      	<div class="row">
      		<div class="col-sm-6">
		<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			<h3>Ubah Posisi</h3>
			<input type="hidden" value="<?=$_GET['nik']?>" name="nik">
			<div class="form-group">
			  <label for="project">Employee Name</label>
			  <input type="text" class="form-control" value="<?=$k['namalengkap']?>" readonly/>
			</div>
			<div class="form-group">
			  <label for="attn">Position</label>
			  <select class="form-control list-attn" name="posisi" required>
			  	<option disabled selected>-- List Position --</option>
			  	<?php $query = mysqli_query($mysqli, "SELECT * FROM list_jabatan WHERE status = 1");
				while($res = mysqli_fetch_object($query)){ ?>
				<option value="<?=$res->id?>" <?php if($aksi=='ubahposisi' && $res->id==$data['jid']) echo "selected"?>><?=$res->position?></option>
				<?php } ?>
			  </select>
			</div>
		  </div>
      	</div>
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-right">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary">Submit</button>
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