<?php
include "header.php";

?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Absensi Lokasi Out
      <small>Form Absensi Lokasi Out</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Absensi Lokasi Out</li>
     
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        Absensi Lokasi Out
      </h3>
    </div>
    <p id="demo"></p>
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  
  document.getElementById("latitude").value = lat;
  document.getElementById("longitude").value = long;
}
</script>



<body onload="getLocation();">

<form role="form" method="post" action="absen_proses_out.php" enctype='multipart/form-data'>

  
    <div class="box-body">
      
      <div class="col-sm-3">
    <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////// Personal Information /////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        
        <div class="form-group">
          <label for="namalengkap">Nama Perusahaan</label>
          <input type="hidden" id="latitude" name="latitude"/>
          <input type="hidden" id="longitude" name="longitude"/>
          <input type="text" class="form-control" placeholder="Nama Perusahaan" name="namaperusahaan" required/>
        </div>
        <div class="form-group">
          <label for="namapanggilan">Foto</label>
          <input type="file" class="btn btn-default btn-sm" placeholder="Foto" name="foto" required/>
        </div>
        
        <div class="box-footer">
        <button class="btn btn-danger get" type="submit" name="submit">Klik Disini untuk Absen</button>
          
        </div>
      <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////
      ///////////////////////////////////////// In Case of mergency ///////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        
      <!-- END -->
      </div>
    </div>
    </form>
</body>
<br><br>
    
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
