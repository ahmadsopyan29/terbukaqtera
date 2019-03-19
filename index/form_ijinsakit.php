<?php

extract($_GET);
date_default_timezone_set('Asia/Jakarta');

  
  $kalimat = $tanggal;
  $arr_kalimat = explode (", ",$kalimat);
  $jumlah = COUNT($arr_kalimat);

  $tgl1 = date('Y-m-d');
  $tgl2 = date('Y-m-d', strtotime('-1 months', strtotime($tgl1)));
  $tgl3 = date('Y-m-d', strtotime('+8 days', strtotime($tgl1)));


    include "header.php";


              $date  = strtotime($tgl1);
              $day   = date('d',$date);
              $month = date('m',$date);
              $year  = date('Y',$date);

  $selectkuota = mysqli_query($mysqli,"SELECT * FROM ijin_sakit a JOIN detail_ijin_sakit b ON a.id_ijin_sakit = b.id_ijin_sakit WHERE a.nik=$nik AND a.status = 0 AND MONTH(b.tanggal) = $month");
  $datakuota = mysqli_num_rows($selectkuota);

  if($datakuota >= 5){
    echo "<script language='javascript'>alert('Pengajuan Anda Telah Melibihi Batas Maximal'); history.go(-1)</script>";
  }else{
  }

?>
<script src="../img.js"></script> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ijin Sakit
      <small>Form Ijin Sakit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ijin Sakit</li>
     
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box">
    <div class="box-header">
      <h3 class="box-title">
        Ijin Sakit
      </h3>
    </div>
    <form role="form" method="post" action="aksiijinsakit.php" enctype='multipart/form-data'>
    
    <div class="box-body">
      <div class="col-sm-6">
      <div class="form-group">
      <div class="form-group">
          <label for="nama">Tanggal </label>
          <input type="hidden" name="nik" value="<?php echo $nik; ?>"/>
          <textarea type="text" class='form-control' placeholder="Enter Launch Dates" readonly name="date" required><?php echo $tanggal; ?></textarea>
          
        </div>
        <br/>
          <div class='col-lg-4'>
            <div class='input-group'>
              <span class='input-group-addon'>
                <input type='radio' name='kategori' value='0' required>
              </span>
              <input type='text' class='form-control' value='BPJS'>
            </div>
          </div>
          <div class='col-lg-4'>
            <div class='input-group'>
              <span class='input-group-addon'>
                <input type='radio' name='kategori' value='1' required>
              </span>
              <input type='text' class='form-control' value='Non BPJS'>
            </div>
          </div>
        </div>
        <br><br>
        
        
        
        <div class="form-group">
          <label for="namapanggilan">Foto Surat Keterangan Dokter</label>
          <input type="file" class="btn btn-default btn-sm" placeholder="Foto" name="foto[]" id="img" onchange="tampilkanPreview(this,'preview')" required />
          <br>
          <img id="preview" src="" alt="" width="35%"/>
							<?php
							include "imgpreview.php";
							?>
        </div>
        <div class="form-group">
          <label for="namapanggilan">Foto Kartu Berobat / Kwitansi Pembayaran Dokter</label>
          <input type="file" class="btn btn-default btn-sm" placeholder="Foto" name="foto[]" id="img1" onchange="tampilkanPreview1(this,'preview1')" required/>
          <br>
          <img id="preview1" src="" alt="" width="35%"/>
							<?php
							include "imgpreview.php";
							?>
        </div>
        <div class="form-group">
          <label for="namapanggilan">Foto Resep Dokter</label>
          <input type="file" class="btn btn-default btn-sm" placeholder="Foto" name="foto[]" id="img2" onchange="tampilkanPreview2(this,'preview2')" required/>
          <br>
          <img id="preview2" src="" alt="" width="35%"/>
							<?php
							include "imgpreview.php";
							?>
        </div>
        <div class="form-group">
          <label for="namapanggilan">Foto Kartu BPJS / Kwitansi Pembayaran resep</label>
          <input type="file" class="btn btn-default btn-sm" placeholder="Foto" name="foto[]" id="img3" onchange="tampilkanPreview3(this,'preview3')" required/>
          <br>
          <img id="preview3" src="" alt="" width="35%"/>
							<?php
							include "imgpreview.php";
							?>
        </div>
        <div class="form-group">
          <label for="add1">Keterangan</label>
          <textarea class="form-control" placeholder="Keterangan" name="keterangan" style="resize: none; height: 80px" required></textarea>
        </div>

        
      
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary"> Ajukan Ijin Sakit</button>
          
      	</div>
      </div>
    </div>
    </form>

    
  </div>
  
</div>

<?php
  
include "footer.php";


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
