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
      Pengajuan Cuti
      <small>Form Pengajuan Cuti</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Pengajuan Cuti</li>
      <li class="active">Form Pengajuan Cuti</li>
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
    <form role="form" method="post" enctype='multipart/form-data'>
    
    <div class="box-body">
      <div class="col-sm-6">
        
        <div class="form-group">
          <label for="agama" >Jumlah Hari</label>
          <select name="jumlah_hari" class="form-control" onChange="this.form.submit()" required>
            <option value="">--  Pilih Jumlah Hari --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
</form>

        <form role="form" method="post" action="aksipengajuancuti.php" enctype='multipart/form-data'>

        <?php 
          if(isset($_POST['jumlah_hari'])){

              $kuota = $datakuota['kuota_cuti'];
              $jumlah_hari = $_POST['jumlah_hari'];

              if($jumlah_hari > $kuota){
                echo "<script language='javascript'>alert('Kouta Cuti Anda Tidak Cukup !!'); history.go(-1)</script>";
              }else{

              if($jumlah_hari == 1){
                echo "
                <div class='form-group'>
                  <label for='nama'>Tanggal</label>
                  <input type='hidden' name='nik' value='$nik'/>
                  <input type='hidden' name='jumlah_hari' value='$jumlah_hari'/>
                  <input type='date' class='form-control' name='tanggal1' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='add1'>Alasan Cuti</label>
                  <textarea class='form-control' placeholder='Alasan Cuti' name='alasan' style='resize: none; height: 80px' required></textarea>
                </div>
              <div class='col-sm-12'>
                <div class='box-footer pull-left'>
                  <button type='button' class='btn btn-danger btn-cancel' onclick='return confirm('Are you sure?')'>Cancel</button>
                  <button type='submit' class='btn btn-primary'> Ajukan Cuti</button>
                  
                </div>
              </div>
                ";
              }elseif($jumlah_hari == 2){
                echo "
                <div class='form-group'>
                  <label for='nama'>Tanggal 1</label>
                  <input type='hidden' name='nik' value='$nik'/>
                  <input type='hidden' name='jumlah_hari' value='$jumlah_hari'/>
                  <input type='date' class='form-control' name='tanggal1' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 2</label>
                  <input type='date' class='form-control' name='tanggal2' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='add1'>Alasan Cuti</label>
                  <textarea class='form-control' placeholder='Alasan Cuti' name='alasan' style='resize: none; height: 80px' required></textarea>
                </div>
            
          
              <div class='col-sm-12'>
                <div class='box-footer pull-left'>
                  <button type='button' class='btn btn-danger btn-cancel' onclick='return confirm('Are you sure?')'>Cancel</button>
                  <button type='submit' class='btn btn-primary'> Ajukan Cuti</button>
                  
                </div>
              </div>
                ";
              }elseif($jumlah_hari == 3){
                echo "
                <div class='form-group'>
                  <label for='nama'>Tanggal 1</label>
                  <input type='hidden' name='nik' value='$nik'/>
                  <input type='hidden' name='jumlah_hari' value='$jumlah_hari'/>
                  <input type='date' class='form-control' name='tanggal1' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 2</label>
                  <input type='date' class='form-control' name='tanggal2' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 3</label>
                  <input type='date' class='form-control' name='tanggal3' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='add1'>Alasan Cuti</label>
                  <textarea class='form-control' placeholder='Alasan Cuti' name='alasan' style='resize: none; height: 80px' required></textarea>
                </div>
            
          
              <div class='col-sm-12'>
                <div class='box-footer pull-left'>
                  <button type='button' class='btn btn-danger btn-cancel' onclick='return confirm('Are you sure?')'>Cancel</button>
                  <button type='submit' class='btn btn-primary'> Ajukan Cuti</button>
                  
                </div>
              </div>
                ";
              }elseif($jumlah_hari == 4){
                echo "
                <div class='form-group'>
                  <label for='nama'>Tanggal 1</label>
                  <input type='hidden' name='nik' value='$nik'/>
                  <input type='hidden' name='jumlah_hari' value='$jumlah_hari'/>
                  <input type='date' class='form-control' name='tanggal1' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 2</label>
                  <input type='date' class='form-control' name='tanggal2' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 3</label>
                  <input type='date' class='form-control' name='tanggal3' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 4</label>
                  <input type='date' class='form-control' name='tanggal4' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='add1'>Alasan Cuti</label>
                  <textarea class='form-control' placeholder='Alasan Cuti' name='alasan' style='resize: none; height: 80px' required></textarea>
                </div>
            
          
              <div class='col-sm-12'>
                <div class='box-footer pull-left'>
                  <button type='button' class='btn btn-danger btn-cancel' onclick='return confirm('Are you sure?')'>Cancel</button>
                  <button type='submit' class='btn btn-primary'> Ajukan Cuti</button>
                  
                </div>
              </div>
                ";
              }elseif($jumlah_hari == 5){
                echo "
                <div class='form-group'>
                  <label for='nama'>Tanggal 1</label>
                  <input type='hidden' name='nik' value='$nik'/>
                  <input type='hidden' name='jumlah_hari' value='$jumlah_hari'/>
                  <input type='date' class='form-control' name='tanggal1' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 2</label>
                  <input type='date' class='form-control' name='tanggal2' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 3</label>
                  <input type='date' class='form-control' name='tanggal3' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 4</label>
                  <input type='date' class='form-control' name='tanggal4' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='nama'>Tanggal 5</label>
                  <input type='date' class='form-control' name='tanggal5' min='$tgl2' required/>
                </div>
                <div class='form-group'>
                  <label for='add1'>Alasan Cuti</label>
                  <textarea class='form-control' placeholder='Alasan Cuti' name='alasan' style='resize: none; height: 80px' required></textarea>
                </div>
            
          
              <div class='col-sm-12'>
                <div class='box-footer pull-left'>
                  <button type='button' class='btn btn-danger btn-cancel' onclick='return confirm('Are you sure?')'>Cancel</button>
                  <button type='submit' class='btn btn-primary'> Ajukan Cuti</button>
                  
                </div>
              </div>
                ";
              }
            }
          }
        
        ?>
        
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
//window.location.href = "dataproduct.php";
window.location.replace("data_pengajuan.php");
});
</script>