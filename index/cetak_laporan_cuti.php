<?php session_start(); ob_start();
include 'connectdb.php';  

$dari = $_GET['bulan'];
$tgl  = strtotime($dari);
$bln = date('M',$tgl);
$thn  = date('Y',$tgl);

$nik = $_GET['nik'];
$nik_pegawai = $_GET['nik_pegawai'];

			$select = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik = '$nik'");
			$data = mysqli_fetch_array($select);
			$nama = $data['namapanggilan'];

			$select1 = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik = '$nik_pegawai'");
			$data1 = mysqli_fetch_array($select1);
			$nama1 = $data1['namapanggilan'];

?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title> Laporan Data Cuti</title>
    <style type="text/css">
		.tabel2 {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		}
		.tabel2 tr.odd td {
		    background-color: #f9f9f9;
		}
		.tabel2 th, .tabel2 td {
	    padding: 4px 5px;
	    line-height: 20px;
	    text-align: left;
	    vertical-align: top;
	    border: 1px solid;
		}
		</style>
  </head>
  <body>
				<table style="width: 100%;">
            <tr>
                <td style="text-align: center;    width: 15%"><img src="../gambar/qtera.png" alt="" width="100"></td>
								<td style="text-align: center;    width: 75%"><font style="font-size: 15px; text-align: center"><b>PT. QTERA MANDIRI</b>
									</font><br/><font style="font-size: 10px; text-align: center"><b>
										

										Rukan Villa Gading Indah Blok A1 No.1
										Jl. Boulevard Bukit Gading Raya<br> Kelapa Gading
										Jakarta Utara 14240
										Indonesia
										<br/> Telp. 0812 5171 2012</b></font></td>
                
            </tr>
				</table>
				<hr/>
				<br/>
				<table style="width: 100%;">
            <tr>
                
								<td style="text-align: center;    width: 100%"><font style="font-size: 15px; text-align: center">Laporan Pengambilan Cuti 
							<?php 
								if( $nik != 1 ){
									echo "$nama";
								}
							?></font></td>
                
            </tr>
				</table>
				<br/>
				<table style="width: 100%;">
            <tr>
                
								<td style="text-align: left;    width: 100%"><font style="font-size: 10px; text-align: left">Tanggal : <?php echo date('d - M - Y'); ?>
								<br/>Periode : <?php echo $bln ?> - <?php echo $thn ?><br/>Dibuat Oleh : <?php echo $nama1; ?></font></td>
                
            </tr>
				</table>
		

		<br/>


		<table class="tabel2" align="center">
		  <thead>
			
		    
				<tr>
						<th style="text-align: center;"><font style="font-size: 10px; text-align: center">No</font></th>
						<?php
						if($nik == 1){
							echo "<th style='text-align: center;'><font style='font-size: 10px; text-align: center'> Nama Pegawai</font></th>";
						}
						?>
						<th style="text-align: center;"><font style="font-size: 10px; text-align: center">Dari Tanggal</font></th>
						<th style="font-size: 16px;" style="text-align: center;"><font style="font-size: 10px; text-align: center">Sampai Tanggal</font></th>
						<th style="font-size: 16px;" style="text-align: center;"><font style="font-size: 10px; text-align: center">Jumlah Hari</font></th>
        </tr>
			</thead>
			<tbody>
			
				<?php 
			if (isset($_GET['bulan'])) {
				$dari = $_GET['bulan'];
				$date  = strtotime($dari);
        $month = date('m',$date);
        $year  = date('Y',$date);
				
					if($nik == 1){
						$query        = "SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1";
						$hasil1 = mysqli_query($mysqli,$query);
						
						
						}else{
						$query        = "SELECT * FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1 AND a.nik = $nik";
						$hasil1 = mysqli_query($mysqli,$query);
						
						}

										if(mysqli_num_rows($hasil1) == 0)
										{die ("<script>alert('Data yang Anda cari tidak ditemukan');location.replace('$base_url')</script>");}
										else{
										$i   = 1;
										while ($hasil = mysqli_fetch_array($hasil1))
										{
											
        ?>
				<tr>
					<td style="text-align: center;    width: 10%"><font style="font-size: 10px; text-align: center"><?php echo $i ?></font></td>
					<?php
						if($nik == 1 ){
							echo "<td style='text-align: center; width: 10%'><font style='font-size: 10px; text-align: center'>".$hasil['namapanggilan']."</font></td>";
						}
					?>
					<td style="text-align: center;    width: 30%"><font style="font-size: 10px; text-align: center"><?php echo $hasil['dari']; ?></font></td>
					<td style="text-align: center;    width: 30%"><font style="font-size: 10px; text-align: center"><?php echo $hasil['sampai']; ?></font></td>
					<td style="text-align: center;    width: 15%"><font style="font-size: 10px; text-align: center"><?php echo $hasil['jumlah_hari']; ?></font></td>
				</tr>	
		      
				
        <?php $i++; } 
				
				if($nik == 1){
					$query1        = "SELECT SUM(a.jumlah_hari) AS jumlah FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1";
					$hasil1 = mysqli_query($mysqli,$query1);
					$data1 = mysqli_fetch_array($hasil1);
					$grand_total = $data1['jumlah'];
		
					
					
					}else{
					$query1        = "SELECT SUM(a.jumlah_hari) AS jumlah FROM pengajuan_cuti a JOIN karyawan b ON a.nik = b.nik WHERE MONTH(a.dari) = $month AND YEAR(a.dari) = $year AND a.acc_leader = 1 AND a.acc_admin = 1 AND a.acc_direktur = 1 AND a.nik = $nik";
					$hasil1 = mysqli_query($mysqli,$query1);
					$data1 = mysqli_fetch_array($hasil1);
					$grand_total = $data1['jumlah'];
					
					}
				?>
				<tr>
						<td style='text-align: center' 
						<?php
							if($nik == 1){
								echo "colspan='4'";
							}else{
								echo "colspan='3'";
							}
						?>
						><font style="font-size: 10px; text-align: right"><b>TOTAL</b></font></td>
						<td style='text-align: center'><font style="font-size: 10px; text-align: center"><?php echo $grand_total; ?></font></td>
          </tr>

				

		  </tbody>
		</table>
				<?php }} ?>
        
				
		

				
<br/><br/><br/><br/>
				<table style="width: 100%;">
            <tr>
                <td style="text-align: center;    width: 75%"></td>
								<td style="text-align: center;    width: 25%"><font style="font-size: 10px; text-align: center"> Mengetahui, <br/> Direktur <br/><br/><br/><br/><br/><br/> __________</font></td>
                
            </tr>
				</table>
	</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->

<?php
// ob_get_clean = salah 1 fungsi dalam PHP
$content = ob_get_clean();
// Memanggil class HTML2PDF dari direktori html2pdf pada project kita
include '../html2pdf/html2pdf.class.php';
try
{
  // Mengatur invoice dalam format HTML2PDF
  // Keterangan: L = Landscape/ P = Portrait, A4 = ukuran kertas, en = bahasa, false = kode HTML2PDF, UTF-8 = metode pengkodean karakter
  $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 5, 10, 0));
  // Mengatur invoice dalam posisi full page
  $html2pdf->pdf->SetDisplayMode('fullpage');
  // Menuliskan bagian content menjadi format HTML
  $html2pdf->writeHTML($content);
  // Mencetak nama file invoice
  $html2pdf->Output('Laporan Cuti.pdf');
}
// Kodingan HTML2PDF
catch(HTML2PDF_exception $e)
{
  echo $e;
  exit;
}
?>
