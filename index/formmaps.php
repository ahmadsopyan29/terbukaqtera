<?php
include "header.php";
extract($_GET);
if (empty($aksi)) {
  $aksi="Tambah";
}
?>
<script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&sensor=false" type="text/javascript"></script>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Absen
      <small>Form Absen Maps</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Absen</li>
      <li class="active">Form Absen Maps</li>
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
      echo ''.$aksi.' data';
    } elseif(! empty($nik) && $aksi=="Ubah"){
      $select = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik = '$nik'");
      $data = mysqli_fetch_array($select);
      $privileges = mysqli_query($mysqli,"SELECT level FROM loginuser WHERE nik = '$nik'");
      $level = mysqli_fetch_array($privileges);
      echo ''.$aksi.' data '.$data['namalengkap'].' ('.$data['nik'].')';
    }
    if(! empty($hasil)){
        echo "<script> alert('".$hasil."');</script>";
      }
        ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="testact.php" enctype='multipart/form-data'>
    <div class="box-body">
      <input type="hidden" name="aksi" <?php echo 'value="'.$aksi.'"'; ?>>
      <div class="form-group">
        <label for="nik">NIK</label>
        <input onkeypress="return isNumber(event)" type="text" name="nik" class="form-control" placeholder="NIK" required <?PHP if(! empty($data)) echo ' value="'.$data['nik'].'" readonly';?>>
      </div>
      <div class="control-group">
       <label class="control-label" for="nama">Nama Lokasi</label>
       <div class="controls">
         <input type="text" name='nama' class='input-xlarge'>
       </div>
     </div> 
     <div class="control-group">
       <label class="control-label" for="lat">latitude</label>
       <div class="controls">
         <input type="text" name='lat' id='lat'  >
       </div>
     </div>
     <div class="control-group">
       <label class="control-label" for="lng">Longitude</label>
       <div class="controls">
         <input type="text" name='lng' id='lng' >
       </div>
     </div>
     <div class="control-group">
       <div class="controls">
         <button type="submit" class="btn btn-success" name='aksi'>Submit</button>
       </div>
     </div>
    </form>
      <div class="col-sm-6">
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Personal Information</h3>
        <div class="form-group">
          <label for="namalengkap">Full Name</label>
          <input type="text" class="form-control" placeholder="Full Name" name="namalengkap" required <?PHP if(! empty($data)) echo ' value="'.$data['namalengkap'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="namapanggilan">Nick Name</label>
          <input type="text" class="form-control" placeholder="Nick Name" name="namapanggilan" required <?PHP if(! empty($data)) echo ' value="'.$data['namapanggilan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="jeniskelamin">Gender</label>
          <div class="radio">
            <label><input type="radio" class="" name="jeniskelamin" <?php if (isset($data['jeniskelamin']) && $data['jeniskelamin']=="pria") echo "checked";?> value="pria">Male</label>
            <label><input type="radio" class="" name="jeniskelamin" <?php if (isset($data['jeniskelamin']) && $data['jeniskelamin']=="wanita") echo "checked";?> value="wanita">Female</label>
          </div>
        </div>
        <div class="form-group">
          <label for="tmptlahir">Place of Birth</label>
          <input type="text" class="form-control" placeholder="Place of Birth" name="tmptlahir"  <?PHP if(! empty($data)) echo ' value="'.$data['tmptlahir'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tgllahir">Date of Birth</label>
          <input type="date" class="form-control pull-right" placeholder="Date of Birth" name="tgllahir" <?PHP if(! empty($data)) echo ' value="'.$data['tgllahir'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="status">Marital Status</label>
          <div class="radio">
            <label><input type="radio" class="" placeholder="Masukkan " name="status" <?php if (! empty($data) && $data['status']=="belum menikah") echo "checked";?> value="belum menikah">Belum Menikah</label>
            <label><input type="radio" class="" placeholder="Masukkan " name="status" <?php if (! empty($data) && $data['status']=="menikah") echo "checked";?> value="menikah">Menikah</label>
            <label><input type="radio" class="" placeholder="Masukkan " name="status" <?php if (! empty($data) && $data['status']=="pernah menikah") echo "checked";?> value="pernah menikah">Pernah Menikah</label>
          </div>
        </div>
        <div class="form-group">
          <label for="agama">Religion</label>
          <select name="agama" class="form-control">
            <option value="Islam">Islam</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Katolik">Katolik</option>
            <option value="Buddha">Buddha</option>
            <option value="Hindu">Hindu</option>
            <option value="Kong Hu Cu">Kong Hu Cu</option>
            <option value="Lain-lain">Lain-lain</option>
          </select>
        </div>
        <div class="form-group">
          <label for="kewarganegaraan">Nasionality</label>
          <select name="kewarganegaraan" class="form-control">
            <option value="wni">WNI</option>
            <option value="wna">WNA</option>
          </select>
        </div>
        <div class="form-group">
          <label for="npwp">No. NPWP</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="No. NPWP" name="npwp" <?PHP if(! empty($data)) echo ' value="'.$data['npwp'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="nokk">No. KK</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="No. KK" name="nokk" <?PHP if(! empty($data)) echo ' value="'.$data['nokk'].'"';?>/>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////// BCA Account /////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Bank Account (BCA)</h3>
        <div class="form-group">
          <label for="namabank">Account Holder Name</label>
          <input type="text" class="form-control" placeholder="Account Holder Name" name="namabank" <?PHP if(! empty($data)) echo ' value="'.$data['namabank'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="norek">Account Number</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Account Number" name="norek" maxlength="10" <?PHP if(! empty($data)) echo ' value="'.$data['norek'].'"';?>/>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////// Spouse ///////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Spouse</h3>
        <div class="form-group">
          <label for="namapasangan">Name</label>
          <input type="text" class="form-control" placeholder="Name" name="namapasangan" <?PHP if(! empty($data)) echo ' value="'.$data['namapasangan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="jeniskelaminpasangan">Gender</label>
          <div class="radio">
            <label><input type="radio" name="jeniskelaminpasangan" <?php if (! empty($data) && $data['jeniskelaminpasangan']=="pria") echo "checked";?> value="pria">Male</label>
            <label><input type="radio" name="jeniskelaminpasangan" <?php if (! empty($data) && $data['jeniskelaminpasangan']=="wanita") echo "checked";?> value="wanita">Female</label>
          </div>
        </div>
        <div class="form-group">
          <label for="tgllahirpasangan">Date of Birth</label>
          <input type="date" class="form-control pull-right" placeholder="Date of Birth" name="tgllahirpasangan" <?PHP if(! empty($data)) echo ' value="'.$data['tgllahirpasangan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="jmlhanak">Number of Kids</label>
          <input onkeypress="return isNumber(event)" type="number" class="form-control" placeholder="Number of Kids" name="jmlhanak" <?PHP if(! empty($data)) echo ' value="'.$data['jmlhanak'].'"';?>/>
        </div>
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////// Attachment ///////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Attachment</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="aktp">KTP</label>
              <input id='file1' type='file' placeholder='KTP' name='aktp'>
              <?PHP
			  /*Gunakan link ke file pada server terbuka untuk attr 'src' e.g //192.168.2.88/terbuka/karyawan/*/
              if(! empty($data['aktp'])){
                echo "<img id='file1' style='cursor:pointer' src='../karyawan/".$data['aktp']."' height='100'>";
              }
              ?>
            </div>
            <div class="form-group">
              <label for="anpwp">NPWP</label>
              <input id='file2' type='file' placeholder='NPWP' name='anpwp'>
              <?PHP
              if(! empty($data['anpwp'])){
                echo "<img id='file2' style='cursor:pointer' src='../karyawan/".$data['anpwp']."' height='100'>";
              }
              ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="akk">KK</label>
              <input id='file3' type='file' placeholder='KK' name='akk'>
              <?PHP
              if(! empty($data['akk'])){
                echo "<img id='file3' style='cursor:pointer' src='../karyawan/".$data['akk']."' height='100'>";
              }
              ?>
            </div>
            <div class="form-group">
              <label for="bca">BCA</label>
              <input id='file4' type='file' placeholder='BCA' name='bca'>
              <?PHP
              if(! empty($data['bca'])){
                echo "<img id='file4' style='cursor:pointer' src='../karyawan/".$data['bca']."' height='100'>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////// Communications /////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Communication</h3>
        <div class="form-group">
          <label for="telp">Home Phone</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Home Phone" name="telp" maxlength="12" <?PHP if(! empty($data)) echo ' value="'.$data['telp'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="nohp">Mobile Phone</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Mobile Phone" name="nohp" maxlength="12" <?PHP if(! empty($data)) echo ' value="'.$data['nohp'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="email" class="form-control" placeholder="E-Mail" name="email" <?PHP if(! empty($data)) echo ' value="'.$data['email'].'"';?>/>
        </div>
  <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////// ID Details /////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>ID Details</h3>
        <div class="form-group">
          <label for="noktp">No KTP</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="No KTP" name="noktp" maxlength="16" <?PHP if(! empty($data)) echo ' value="'.$data['noktp'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="kotaterbitktp">Place of Issue</label>
          <input type="text" class="form-control" placeholder="Place of Issue" name="kotaterbitktp" <?PHP if(! empty($data)) echo ' value="'.$data['kotaterbitktp'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tglterbit">Date of Issue</label>
          <input type="date" class="form-control" placeholder="Date of Issue" name="tglterbit" <?PHP if(! empty($data)) echo ' value="'.$data['tglterbit'].'"';?>/>
        </div>
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////// Address ////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>Address</h3>
        <div class="form-group">
          <label for="alamat">Street name</label>
          <input type="text" class="form-control" placeholder="Street Name" name="alamat" <?PHP if(! empty($data)) echo ' value="'.$data['alamat'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="kota">Area name</label>
            <input type="text" class="form-control" placeholder="Area Name" name="kota" <?PHP if(! empty($data)) echo ' value="'.$data['kota'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="provinsi">State / City</label>
            <input type="text" class="form-control" placeholder="State / City" name="provinsi" <?PHP if(! empty($data)) echo ' value="'.$data['provinsi'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="negara">Country</label>
            <input type="text" class="form-control" placeholder="Country" name="negara" <?PHP if(! empty($data)) echo ' value="'.$data['negara'].'"';?>/>
        </div>
        <div class="form-group">
            <label for="kdpos">Postal Code</label>
            <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Postal Code" name="kdpos" <?PHP if(! empty($data)) echo ' value="'.$data['kdpos'].'"';?>/>
        </div>
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ///////////////////////////////////////// In Case of mergency ///////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <h3>In Case of Emergency</h3>
        <div class="form-group">
          <label for="namadarurat">Name</label>
          <input type="text" class="form-control" placeholder="Name" name="namadarurat" <?PHP if(! empty($data)) echo ' value="'.$data['namadarurat'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="hubdarurat">Relationship</label>
          <input type="text" class="form-control" placeholder="Relationship" name="hubdarurat" <?PHP if(! empty($data)) echo ' value="'.$data['namapasangan'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="almtdarurat">Address</label>
          <input type="text" class="form-control" placeholder="Address" name="almtdarurat" <?PHP if(! empty($data)) echo ' value="'.$data['almtdarurat'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="tlpdarurat">Phone</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Phone" name="tlpdarurat" <?PHP if(! empty($data)) echo ' value="'.$data['tlpdarurat'].'"';?>/>
        </div>
        <div class="form-group">
          <label for="hpdarurat">Mobile</label>
          <input onkeypress="return isNumber(event)" type="text" class="form-control" placeholder="Mobile" name="hpdarurat" <?PHP if(! empty($data)) echo ' value="'.$data['hpdarurat'].'"';?>/>
        </div>
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ///////////////////////////////////////// In Case of mergency ///////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="form-group">
          <label for="level">privileges</label>
          <div class="radio">
            <label><input type="radio" class="" name="level" checked value="2">User</label>
            <label><input type="radio" class="" name="level" <?php if (isset($level['level']) && $level['level']=="1") echo "checked";?> value="1">Administrator</label>
          </div>
        </div>
        <div class="box-footer">
          <button type="button" class="btn btn-danger btn-cancel">Cancel</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      <!-- END -->
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
