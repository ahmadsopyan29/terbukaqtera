<?php
include "header.php";
extract($_GET);

?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Kuota Cuti
      <small>Form Kuota Cuti</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Kuota Cuti</li>
      <li class="active">Form Kuota Cuti</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">
    <div class="box-header">
      <h3 class="box-title">
        <?php
    if ($aksi=="Tambah") {
      echo ''.$aksi.' Customer';
    } else if($aksi=="Tambah Kontak"){
		echo $aksi;
	}elseif(! empty($id) && $aksi=="Ubah"){
      $select = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik = '$id'");
      $data = mysqli_fetch_array($select);
      
    }
    if(! empty($hasil)){
        echo "<script> alert('".$hasil."');</script>";
      }
        ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksikuotacuti.php" enctype='multipart/form-data'>
    <?php if($aksi!="Tambah")echo '<input type="hidden" name="id" value="'.$id.'"/>';?>
    <div class="box-body">
      <div class="col-sm-6">
        <h3>Edit Kuota Cuti</h3>
        <div class="form-group">
          <label for="nama">Nama Pegawai</label>
          <input type="text" class="form-control" placeholder="Company Name" name="namalengkap" required <?PHP if(! empty($data)) echo ' value="'.$data['namalengkap'].'" readonly';?>/>
        </div>
        <div class="form-group">
          <label for="add1">Kuota</label>
          <input type="text" class="form-control" placeholder="Company Name" name="kuota_cuti" required <?PHP if(! empty($data)) echo ' value="'.$data['kuota_cuti'].'"';?>/>
        </div>
        
		
  
		  </select>
        </div>
        
      
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary"><?php if($aksi=='Tambah' || $aksi=='Tambah Kontak') echo 'Add'; else if($aksi=='Ubah') echo 'Change'; ?></button>
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