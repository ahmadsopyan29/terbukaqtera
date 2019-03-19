<?php
include "header.php";
extract($_GET);
$selectijinsakit = mysqli_query($mysqli,"SELECT * FROM pengajuan_cuti WHERE id_pengajuan=$id ");
$data = mysqli_fetch_array($selectijinsakit);

$acc_dir = $data['acc_direktur'];
$acc_admin = $data['acc_admin'];
$acc_lead = $data['acc_leader'];
?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengajuan Cuti
      <small>Detail Pengajuan Cuti</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Pengajuan Cuti</li>
      <li class="active">Detail Pengajuan Cuti</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">
      <?php
              if ( $acc_dir == 2 OR $acc_admin == 2 OR $acc_lead == 2){
                echo "<td><div class='form-group has-error'>
                <label class='control-label' for='inputError'>Status : Ditolak</label>
                </div></td>
                ";
              }elseif ( $acc_dir == 0 OR $acc_admin == 0 OR $acc_lead == 0 ){
                echo "<td><div class='form-group has-warning'>
                <label class='control-label' for='inputWarning'>Status : Menunggu</label>
                </div></td>
                ";
              }elseif ( $acc_dir == 1 AND $acc_admin == 1 AND $acc_lead == 1 ){
                echo "<td><div class='form-group has-success'>
                <label class='control-label' for='inputSuccess'>Status : Disetujui</label>
                </div></td>
                ";
              }else{
                echo "<td>-</td>";
              }
            ?>
      </h3>
    </div>
    <!-- /.box-header -->
    <form role="form" method="post" action="testact.php" enctype='multipart/form-data'>
    <div class="box-body">
      <div class="col-sm-6">
      <div class="form-group">
        <div class="row">

                <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" <?php if($data['acc_direktur'] == 1){ echo "checked";} ?> disabled>
                        </span>
                    <input type="text" class="form-control" value="ACC DIREKTUR" disabled>
                  </div>
                  <!-- /input-group -->
                </div>
        </div> 
        </div>
        <div class="form-group">
        <div class="row">

                 <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" <?php if($data['acc_admin'] == 1){ echo "checked";} ?> disabled>
                        </span>
                    <input type="text" class="form-control" value="ACC ADMIN" disabled>
                  </div>
                  <!-- /input-group -->
                </div>
        </div> 
        </div>
        <div class="form-group">
        <div class="row">

        <div class="col-lg-6">
                  <div class="input-group">
                        <span class="input-group-addon">
                          <input type="checkbox" <?php if($data['acc_leader'] == 1){ echo "checked";} ?> disabled>
                        </span>
                    <input type="text" class="form-control" value="ACC LEADER" disabled>
                  </div>
                  <!-- /input-group -->
                </div>
        </div> 
        </div>

            
        
        
        
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Kembali</button>
      		
          
      	</div>
      </div>
      
    </div>
    </form>
  </div>

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
	window.location.replace("data_pengajuan.php");
});
</script>
