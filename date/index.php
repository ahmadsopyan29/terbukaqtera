<!DOCTYPE html>
<html>
  <?php
include "../index/connectdb.php";
session_start();
if(empty($_SESSION)){
  header("location:../index.php");
}
$nik = $_SESSION['nik'];
$nik_pegawai = $_SESSION['nik'];
$level = $_SESSION['level'];



?>



  <head>
    <!--META ATTRIBUTES-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <title>Qtera Mandiri</title>

    <!-- REFERENCE CSS-->
    <link rel="stylesheet" href="assets/css/framework7.material.min.css">
    <link rel="stylesheet" href="assets/css/framework7.material.colors.min.css">
    <link rel="stylesheet" href="assets/css/my-app.css">

  </head>
  <body>

    <!-- VIEWS-->
    <div class="views">

      <!-- Your main view, should have "view-main" class-->
      <div class="view view-main">


          <!-- Page, data-page contains page name-->
          <div data-page="index" class="page">

            <!-- Scrollable page content-->
            <div class="page-content">
              
              <div class="content-block"><b>Pilih Tanggal Ijin Sakit</b></div>
              <div class="list-block">
                <ul>
                  <li>
                  <form role="form" method="post" action="../index/form_ijinsakit.php" enctype='multipart/form-data'>
                    <div class="item-content"> 
                        <div class="item-input">
                          <textarea type="text" placeholder="Klik Disini Untuk Pilih Tanggal" id="mCalenderID" name="date" required></textarea>
                          
                        </div>   
                    </div>
                    
                  
                  </li>
                </ul>
              </div>

              
              <div class="content-block">
                <div class="row">
                  <div ><button class="button button-raised button-fill color-cyan" type='submit'>Set Tanggal</a></div><br/>
                  
                </div>
                </form>
                <br>
                <div class="row">
                <form role="form" method="post" action="../index/data_ijinsakit.php" enctype='multipart/form-data'>
                  
                  <div ><button class="button button-raised button-fill color-red btn-cancel" onclick="return confirm('Are you sure?')" >Cancel</a></div>
                </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner"><a href="#" class="link">Dashboard</a></div>
        </div>
      </div>
    </div>

    <!-- REFERENCE SCRIPTS-->
    <script type="text/javascript" src="assets/js/framework7.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript">
	
$(".btn-cancel").click(function(){
	window.location.replace("data_ijinsakit.php");
});
</script>
  </body>
</html>