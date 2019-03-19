<?php
include "header.php";
extract($_GET);
$select = mysqli_query($mysqli,"SELECT * FROM absen_maps a JOIN karyawan b ON a.nik=b.nik WHERE idabsen_maps='$id'");
$data = mysqli_fetch_array($select);
?>
<style type="text/css">
      html { height: 100% }
      body { height: 100%; }
      #map-canvas { height: 100% }
    </style>
    <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> --> <!-- old version, doesnt work in localhost --> 
    <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&sensor=false" type="text/javascript"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lokasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Absen Lokasi</li>
      <li class="active">Lokasi</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-10">
          <h3 class="box-title">Data Keterangan Absen Lokasi <?php echo $data['namapanggilan']; ?>, Tanggal : <?php echo $data['tanggal']; ?> Pukul : <?php echo $data['jam']; ?> </h3>
        </div>
      </div>
    </div>
    <a href="index.php">Input Lokasi</a> | 
    <a href="tampil.php">Lihat Daftar Lokasi </a> |
    <a href="semua.php">Semua Lokasi</a> |
    <a href="cusmark.php">Custom Marker</a><br/><br/>
    <h3>Lokasi : <?php echo $data['namapanggilan']; ?></h3>
    <div id="map-canvas" style="max-width:500px;max-height: 300px;"/>
  </div>
  <!-- Main content -->
</div>

<?php
include "footer.php"
 ?>
 <script type="text/javascript">
        function initialize() {
    var mapOptions = {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo "$data[latitude], $data[longitude]"; ?>)
    }
    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
    
    setMarkers(map, beaches);
  }

  var beaches = [
    ['<?php echo "$data[namapanggilan]"; ?>', <?php echo "$data[latitude], $data[longitude]"; ?>],
  ];

  function setMarkers(map, locations) {
    var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
    };
    var infoWindow = new google.maps.InfoWindow;
    for (var i = 0; i < locations.length; i++) {
      var beach = locations[i];
      var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: beach[4],
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
      });
      var html = 'Lokasi : '+beach[0]+'<br/>Latitude : '+beach[1]+'<br/>Longitude : '+beach[2]+'';
      bindInfoWindow(marker, map, infoWindow, html);
    }
  }
  
  function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
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