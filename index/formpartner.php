<?php
include "header.php";
extract($_GET);
if (empty($aksi)) {
  $aksi="Tambah";
}
?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Partner
      <small>Form Partner</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Partner</li>
      <li class="active">Form Partner</li>
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
      echo ''.$aksi.' Partner';
    } else if($aksi=="Tambah Kontak"){
		echo $aksi;
	} elseif(! empty($id) && $aksi=="Ubah"){
      $select = mysqli_query($mysqli,"SELECT *, partner_acc.id as pid FROM partner_acc WHERE partner_acc.id = '$id'");
      $data = mysqli_fetch_array($select);
      $privileges = mysqli_query($mysqli,"SELECT level FROM loginuser WHERE nik = '$nik'");
      $level = mysqli_fetch_array($privileges);
      echo ''.$aksi.' data '.$data['partner_name'].' (PRT'.str_pad($data['pid'], 4, 0,STR_PAD_LEFT).')';
    }
    if(! empty($hasil)){
        echo "<script> alert('".$hasil."');</script>";
      }
        ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="aksipartner.php?aksi=<?=strtolower($aksi)?>" enctype='multipart/form-data'>
    <?php if($aksi!="Tambah")echo '<input type="hidden" name="id" value="'.$id.'"/>';?>
    <div class="box-body">
      <div class="col-sm-6">
     <?php if($aksi!="Tambah Kontak"){ ?>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Personal Information</h3>
        <div class="form-group">
          <label for="nama">Partner Name</label>
          <input type="text" class="form-control" placeholder="Partner Name" name="nama" required <?PHP if(! empty($data)) echo ' value="'.$data['partner_name'].'" readonly';?>/>
        </div>
        <div class="form-group">
          <label for="add1">Address 1</label>
          <textarea class="form-control" placeholder="Address 1" name="add1" style="resize: none; height: 80px" required ><?PHP if(! empty($data)) echo $data['street1'];?></textarea>
        </div>
        <div class="form-group">
          <label for="add2">Address 2</label>
          <textarea class="form-control" placeholder="Address 2" name="add2" style="resize: none; height: 80px" ><?PHP if(! empty($data)) echo $data['street2'];?></textarea>
        </div>
        <div class="form-group">
          <label for="join">Date Join</label>
          <input  <?PHP if(empty($data)) echo 'type="date"'; else echo 'type="text"'; ?> class="form-control" placeholder="Date Join" name="join" required <?PHP if(! empty($data)) echo ' value="'.$data['date_join'].'" readonly';?>/>
        </div>
      </div>
      <div class="col-sm-6">
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////// Acc. Manager /////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Channel Manager</h3>
		<div class="form-group">
		  <label for="project">Channel Manager</label>
		  <select class="form-control list-partner" name="ch_manager" required>
			<option disabled selected>-- List Channel Manager --</option>
			<?php $query = mysqli_query($mysqli, "SELECT id, karyawan.namalengkap as nama FROM karyawan_jabatan INNER JOIN karyawan ON karyawan_jabatan.nik = karyawan.nik WHERE position = 10 OR position = 11");
			while($res = mysqli_fetch_object($query)){ ?>
			<option value="<?=$res->id?>" <?php if($data['ch_manager']==$res->id) echo "selected"; ?> ><?=$res->nama?></option>
			<?php } ?>
		  </select>
		</div>
	<?php } ?>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////// Contact ///////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
       <?php if($aksi=="Tambah" || $aksi=="Tambah Kontak"){ ?>
        <h3>Contact</h3>
        <div class="form-group">
          <label for="prefix">Prefix</label>
          <select class="form-control list-customer" name="prefix" required>
			<option value="1" selected>Mr.</option>
			<option value="2" >Mrs.</option>
			<option value="3" >Miss</option>
		  </select>
        </div>
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" class="form-control" placeholder="First Name" name="fname" required>
        </div>
        <div class="form-group">
          <label for="lname">Last Name</label>
          <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
        </div>
        <div class="form-group">
          <label for="ext">Ext. Number</label>
          <input type="text" class="form-control" placeholder="Ext. Number" name="ext" required>
        </div>
        <div class="form-group">
          <label for="aemail">Allow E-mail</label>
          <select class="form-control list-customer" name="aemail" required>
			<option value="1" selected>Yes</option>
			<option value="2" >No</option>
		  </select>
        </div>
        <div class="form-group">
          <label for="acall">Allow Call</label>
          <select class="form-control list-customer" name="acall" required>
			<option value="1" selected>Yes</option>
			<option value="2" >No</option>
		  </select>
        </div>
        <div class="form-group">
          <label for="position">Position</label>
          <input type="text" class="form-control" placeholder="Position" name="position" required>
        </div>
      <?php } ?>
      <!-- END -->
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-right">
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
window.location.replace("datapartner.php");
});
</script>