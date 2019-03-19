<?php
include "header.php";

?>
<script src="../img.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Laporan Cuti
      <small>Form Laporan Cuti</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="">Data Laporan Cuti</li>
      <li class="active">Form Laporan Cuti</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <section class="content">
    <div class="box row">

    <!-- /.box-header -->
    <form role="form" method="post" enctype='multipart/form-data'>
    
    <div class="box-body">
      <div class="col-sm-6">
        
        <div class="form-group">
          <label for="nama">Pilih Periode</label>
          <input class="form-control" name="dari" type="month" value="<?php echo date('Y-m'); ?>" max="<?php echo date('Y-m'); ?>" required/>
        </div>
        <div class="form-group">
          <label for="add1">Pilih Pegawai</label>
                        <select name="pegawai" class="form-control" required>
                              <option value='' selected>- Pilih Pegawai -</option>
                              <option value='1'>Semua</option>
                              <?php
                                  $select=mysqli_query($mysqli,"SELECT * FROM karyawan WHERE aktif='1' AND nik!='00000000' AND nik!='11111111'");
                              while ($row1 = mysqli_fetch_array($select)){
                                echo "<option value=$row1[nik]>$row1[namapanggilan]</option>";
                              }
                              ?>
                        </select>
        </div>
        
      </div>
      <div class="col-sm-12">
      	<div class="box-footer pull-left">
      		<button type="button" class="btn btn-danger btn-cancel" onclick="return confirm('Are you sure?')">Cancel</button>
      		<button type="submit" class="btn btn-primary" name="submit"> Proses</button>
          
      	</div>
      </div>
    </div>
    </form>
  </div>
        <?php  
						if (isset($_POST['submit'])) {
              $pegawai = $_POST['pegawai'];
              $dari = $_POST['dari'];
              $date  = strtotime($dari);
              $month = date('m',$date);
              $year  = date('Y',$date);

                $selectnama        = "SELECT * FROM karyawan WHERE nik=$pegawai";
                $datanama = mysqli_query($mysqli,$selectnama);
                $dataname = mysqli_fetch_array($datanama);
                $nama = $dataname['namapanggilan'];

              if($pegawai == 1){
                $query        = "SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1";
                $hasil = mysqli_query($mysqli,$query);
                
                
                }else{
                $query        = "SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1 AND a.nik = $pegawai";
                $hasil = mysqli_query($mysqli,$query);
                
                }
         
          

          
          if(mysqli_num_rows($hasil) == 0)
          {
            if($pegawai == 1){
              echo "<script language='javascript'>alert('Tidak Ada Pengambilan Hak Cuti Pada Periode Bulan $month,$year'); history.go(-1)</script>";
            }else{
              echo "<script language='javascript'>alert('Tidak Ada Pengambilan Hak Cuti Pada Periode Bulan $month,$year Atas Nama $nama'); history.go(-1)</script>";
            }
          }else
							{
					
            echo "
            
            <div class='box row'>
        
          <div class='box-body table-responsive padding'>
            
            <div class='panel-heading' align='left'>";

            

            echo "<a href='cetak_laporan_cuti.php?nik_pegawai=$nik_pegawai&&bulan=$dari&&nik=$pegawai' target='_BLANK' class='btn btn-success'><i class='fa fa-print'></i> Cetak Laporan Cuti ";
            
            if($pegawai != 1){
              echo " $nama";
            }
            echo "</a>
            </div>
            <table class='col-md-12 table-bordered table-striped table-condensed cf'>
      <thead class='cf'>
        <tr>
          <td align='center'><b>NO.</b></td>";
          if($pegawai == 1){
        echo "
          <td align='center'><b>NAMA</b></td>";
        }

         echo " <td align='center'><b>DARI</b></td>
          <td align='center'><b>SAMPAI</b></td>
          <td align='center'><b>JUMLAH HARI</b></td>
          
        </tr>
      </thead>
      <tbody>
        <tr>";

    $no = 1;
    while($data = mysqli_fetch_array($hasil))
    {
      


      echo "
      
          <td data-title='No.' align='center'>".$no."</td>";
          if($pegawai == 1){
          echo "<td data-title='No.' align='center'>".$data['namapanggilan']."</td>";
          }
      echo "<td data-title='Harga Diskon' align='center'>".$data['dari']."</td>
          <td data-title='Harga Diskon' align='center'>".$data['sampai']."</td>
          <td data-title='Harga Diskon' align='center'>".$data['jumlah_hari']."</td>";
    echo "
          
          
        </tr>";
      $no++;
    }
    if($pegawai == 1){
      $query1        = "SELECT SUM(a.jumlah_hari) AS jumlah FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1";
      $hasil1 = mysqli_query($mysqli,$query1);
      $data1 = mysqli_fetch_array($hasil1);
      $grand_total = $data1['jumlah'];

      
      
      }else{
      $query1        = "SELECT SUM(a.jumlah_hari) AS jumlah FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1 AND a.nik = $pegawai";
      $hasil1 = mysqli_query($mysqli,$query1);
      $data1 = mysqli_fetch_array($hasil1);
      $grand_total = $data1['jumlah'];
      
      }
          

          echo "
      
        <tr>
          <td data-title='No.'";
          if($pegawai == 1){
            echo "colspan='4'";
          }else{
            echo "colspan='3'";
          }
          echo " align='right'><b> TOTAL HARI</b></td>
          
          <td data-title='Harga Diskon' align='center'><b>$grand_total</b></td>
          
          
        </tr></tbody>
        </table></div>
        </div>";

          

          
					?>
					<?php
            } }?>
            


  <!-- Main content -->
  </div>
  </section>


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