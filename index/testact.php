<?php
include "connectdb.php";
extract($_POST);
extract($_GET);
if ($aksi=="Tambah") {
	$select = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik = '$nik'");
	$data = mysqli_fetch_array($select, MYSQLI_NUM);
	if($data[0] > 1){
	  echo "Karyawan telah terdaftar";
	}
	else {
		$aktp = $_FILES['aktp']['name'];
		$akk = $_FILES['akk']['name'];
		$anpwp = $_FILES['anpwp']['name'];
		$bca = $_FILES['bca']['name'];
		$target_dir = "../karyawan/"; /*Gunakan smb ke dir terbuka e.g \\192.168.2.88\terbuka\karyawan\*/
		$extensions_arr = array("jpg","jpeg","png","gif");
		$target_file_ktp = $target_dir . basename($_FILES["aktp"]["name"]);
		$imageFileType_ktp = strtolower(pathinfo($target_file_ktp,PATHINFO_EXTENSION));
		$target_file_kk = $target_dir . basename($_FILES["akk"]["name"]);
		$imageFileType_kk = strtolower(pathinfo($target_file_kk,PATHINFO_EXTENSION));
		$target_file_npwp = $target_dir . basename($_FILES["anpwp"]["name"]);
		$imageFileType_npwp = strtolower(pathinfo($target_file_npwp,PATHINFO_EXTENSION));
		$target_file_bca = $target_dir . basename($_FILES["bca"]["name"]);
		$imageFileType_bca = strtolower(pathinfo($target_file_bca,PATHINFO_EXTENSION));
		$bktp = $nik.'ktp';
		$bkk = $nik.'kk';
		$bnpwp = $nik.'npwp';
		$bbca = $nik.'bca';
		$sql = "INSERT INTO karyawan(
									nik,
									namalengkap,
									namapanggilan,
									jeniskelamin,
									tmptlahir,
									tgllahir,
									status,
									agama,
									kewarganegaraan,
									npwp,
									nokk,
									telp,
									nohp,
									email,
									noktp,
									kotaterbitktp,
									tglterbit,
									alamat,
									kota,
									provinsi,
									negara,
									kdpos,
									namabank,
									norek,
									namapasangan,
									jeniskelaminpasangan,
									tgllahirpasangan,
									jmlhanak,
									namadarurat,
									hubdarurat,
									almtdarurat,
									tlpdarurat,
									hpdarurat,
									aktp,
									akk,
									anpwp,
									bca,
									aktif,
									id_dept,
									status_anggota
								) VALUES(
									'$nik',
									'$namalengkap',
									'$namapanggilan',
									'$jeniskelamin',
									'$tmptlahir',
									'$tgllahir',
									'$status',
									'$agama',
									'$kewarganegaraan',
									'$npwp',
									'$nokk',
									'$telp',
									'$nohp',
									'$email',
									'$noktp',
									'$kotaterbitktp',
									'$tglterbit',
									'$alamat',
									'$kota',
									'$provinsi',
									'$negara',
									'$kdpos',
									'$namabank',
									'$norek',
									'$namapasangan',
									'$jeniskelaminpasangan',
									'$tgllahirpasangan',
									'$jmlhanak',
									'$namadarurat',
									'$hubdarurat',
									'$almtdarurat',
									'$tlpdarurat',
									'$hpdarurat',
									'$bktp',
									'$bkk',
									'$bnpwp',
									'$bbca',
									'1',
									'$id_dept',
									'$status_anggota'
								)";
		if(mysqli_query($mysqli, $sql)){
			if( in_array($imageFileType_ktp,$extensions_arr) ){
				move_uploaded_file($_FILES['aktp']['tmp_name'],$target_dir.$bktp);
			}
			if( in_array($imageFileType_kk,$extensions_arr) ){
				move_uploaded_file($_FILES['akk']['tmp_name'],$target_dir.$bkk);
			}
			if( in_array($imageFileType_npwp,$extensions_arr) ){
				move_uploaded_file($_FILES['anpwp']['tmp_name'],$target_dir.$bnpwp);
			}
			if( in_array($imageFileType_bca,$extensions_arr) ){
				move_uploaded_file($_FILES['bca']['tmp_name'],$target_dir.$bbca);
			}
			$username = strtolower($namapanggilan);
			$pass = md5($username);
			$sqli = "INSERT INTO loginuser(nik,username,password,level) VALUES ('$nik','$username','$pass','$level')";
			if(mysqli_query($mysqli, $sqli)){
				header('Location:datapegawai.php?hasil=Berhasil menambah data');
			}
			else {
				header('Location:datapegawai.php?hasil=Gagal daftar');
			}
		}
	    else{
	    	header('Location:datapegawai.php?hasil='.mysqli_error($mysqli));
		}
	}
} elseif($aksi=="Ubah") {
	$sql = "UPDATE karyawan SET
								namalengkap='$namalengkap',
								namapanggilan='$namapanggilan',
								jeniskelamin='$jeniskelamin',
								tmptlahir='$tmptlahir',
								tgllahir='$tgllahir',
								status='$status',
								agama='$agama',
								kewarganegaraan='$kewarganegaraan',
								npwp='$npwp',
								nokk='$nokk',
								telp='$telp',
								nohp='$nohp',
								email='$email',
								noktp='$noktp',
								kotaterbitktp='$kotaterbitktp',
								tglterbit='$tglterbit',
								alamat='$alamat',
								kota='$kota',
								provinsi='$provinsi',
								negara='$negara',
								kdpos='$kdpos',
								namabank='$namabank',
								norek='$norek',
								namapasangan='$namapasangan',
								jeniskelaminpasangan='$jeniskelaminpasangan',
								tgllahirpasangan='$tgllahirpasangan',
								jmlhanak='$jmlhanak',
								namadarurat='$namadarurat',
								hubdarurat='$hubdarurat',
								almtdarurat='$almtdarurat',
								tlpdarurat='$tlpdarurat',
								hpdarurat='$hpdarurat',
								id_dept='$id_dept',
								status_anggota='$status_anggota'
							WHERE nik='$nik'";
	  if(mysqli_query($mysqli, $sql)){
			$aktp = $_FILES['aktp']['name'];
			$akk = $_FILES['akk']['name'];
			$anpwp = $_FILES['anpwp']['name'];
			$bca = $_FILES['bca']['name'];
	  		if(! empty($aktp)){
				$target_dir = "../karyawan/";
				$extensions_arr = array("jpg","jpeg","png","gif");
				$target_file_ktp = $target_dir . basename($_FILES["aktp"]["name"]);
				$imageFileType_ktp = strtolower(pathinfo($target_file_ktp,PATHINFO_EXTENSION));
				$bktp = $nik.'ktp';
				if( in_array($imageFileType_ktp,$extensions_arr) ){
					move_uploaded_file($_FILES['aktp']['tmp_name'],$target_dir.$bktp);
					mysqli_query($mysqli,"UPDATE karyawan SET aktp='$bktp' WHERE nik='$nik'");
				}
			}
			if(! empty($akk)){
				$target_dir = "../karyawan/";
				$extensions_arr = array("jpg","jpeg","png","gif");
				$target_file_kk = $target_dir . basename($_FILES["akk"]["name"]);
				$imageFileType_kk = strtolower(pathinfo($target_file_kk,PATHINFO_EXTENSION));
				$bkk = $nik.'kk';
				if( in_array($imageFileType_kk,$extensions_arr) ){
					move_uploaded_file($_FILES['akk']['tmp_name'],$target_dir.$bkk);
					mysqli_query($mysqli,"UPDATE karyawan SET akk='$bkk' WHERE nik='$nik'");
				}
			}
			if(! empty($anpwp)){
				$target_dir = "../karyawan/";
				$extensions_arr = array("jpg","jpeg","png","gif");
				$target_file_npwp = $target_dir . basename($_FILES["anpwp"]["name"]);
				$imageFileType_npwp = strtolower(pathinfo($target_file_npwp,PATHINFO_EXTENSION));
				$bnpwp = $nik.'npwp';
				if( in_array($imageFileType_npwp,$extensions_arr) ){
					move_uploaded_file($_FILES['anpwp']['tmp_name'],$target_dir.$bnpwp);
					mysqli_query($mysqli,"UPDATE karyawan SET anpwp='$bnpwp' WHERE nik='$nik'");
				}
			}
			if(! empty($bca)){
				$target_dir = "../karyawan/";
				$extensions_arr = array("jpg","jpeg","png","gif");
				$target_file_bca = $target_dir . basename($_FILES["bca"]["name"]);
				$imageFileType_bca = strtolower(pathinfo($target_file_bca,PATHINFO_EXTENSION));
				$bbca = $nik.'bca';
				if( in_array($imageFileType_bca,$extensions_arr) ){
					move_uploaded_file($_FILES['bca']['tmp_name'],$target_dir.$bbca);
					mysqli_query($mysqli,"UPDATE karyawan SET bca='$bbca' WHERE nik='$nik'");
				}
			}
			$username = strtolower($namapanggilan);
			$sqli = "UPDATE loginuser SET username='$username',level='$level' WHERE nik='$nik'";
			if(mysqli_query($mysqli, $sqli)){
				header('Location:datapegawai.php?hasil=Berhasil mengubah data');
			}
			else {
				header('Location:datapegawai.php?hasil=Gagal mengubah data');
			}
		}
	    else{
			header('Location:datapegawai.php?hasil=Gagal mengubah data');
	  }
} elseif($aksi=="hapus") {
	$sql = "DELETE FROM karyawan_jabatan WHERE nik='$nik'";
	if(mysqli_query($mysqli, $sql)){
		$gambar = mysqli_query($mysqli,"SELECT aktp,akk,anpwp,bca FROM karyawan WHERE nik='$nik'");
		$data = mysqli_fetch_array($gambar);
		$aktp="../karyawan/".$data['aktp'];
		unlink($aktp);
		$akk="../karyawan/".$data['akk'];
		unlink($akk);
		$anpwp="../karyawan/".$data['anpwp'];
		unlink($anpwp);
		$bca="../karyawan/".$data['bca'];
		unlink($bca);
		$sql = "DELETE FROM karyawan WHERE nik='$nik'";
		if(mysqli_query($mysqli, $sql)){
			$user = "DELETE FROM loginuser WHERE nik=$nik";
			if(mysqli_query($mysqli, $user)){
				header('Location:datapegawai.php?hasil=Berhasil menghapus data');
			} else {
				header('Location:datapegawai.php?hasil=Gagal menghapus data');	
			}
		} else {
		    header('Location:datapegawai.php?hasil=Gagal menghapus data');
		}
	} else {
	    header('Location:datapegawai.php?hasil=Gagal menghapus data');
	}
} elseif ($aksi=="refresh") {
	$IP="192.168.88.123";
	$Key="0";
	$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
	if($Connect){
		$soap_request="<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">".$Key."</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>";
		$newLine="\r\n";
		fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
	    fputs($Connect, "Content-Type: text/xml".$newLine);
	    fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
	    fputs($Connect, $soap_request.$newLine);
		$buffer="";
		while($Response=fgets($Connect, 1024)){
				$buffer=$buffer.$Response;
		}
	}else echo "Koneksi mesin fingerprint gagal";

	function Parse_Data($data,$p1,$p2){
		$data=" ".$data;
		$hasil="";
		$awal=strpos($data,$p1);
		if($awal!=""){
			$akhir=strpos(strstr($data,$p1),$p2);
			if($akhir!=""){
				$hasil=substr($data,$awal+strlen($p1),$akhir-strlen($p1));
			}
		}
		return $hasil;	
	}
	$buffer=Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
	$buffer=explode("\r\n",$buffer);
	for($a=0;$a<count($buffer);$a++){
		$data=Parse_Data($buffer[$a],"<Row>","</Row>");
		$PIN=Parse_Data($data,"<PIN>","</PIN>");
		if ($PIN=='2') {
			$PIN='18021202';
		}
		$DateTime=Parse_Data($data,"<DateTime>","</DateTime>");
		$Verified=Parse_Data($data,"<Verified>","</Verified>");
		$Status=Parse_Data($data,"<Status>","</Status>");
		$ex1=explode('-',$DateTime);
		$ex2=implode('', $ex1);
		$ex3=explode(':', $ex2);
		$ex4=implode('', $ex3);
		$tgljam= new DateTime($DateTime);
		$tgl=$tgljam->format('Y.n.j');
		$jam=$tgljam->format('H:i:s');
		$idabsen=substr(str_replace(' ', $PIN, $ex4),2);
		if ($idabsen=="") {
			# code...
		} else {
			$sql = "INSERT IGNORE INTO absen(idabsen, tanggal, nik, jam, status) VALUES('$idabsen', '$tgl', '$PIN','$jam','$Status')";
			if(mysqli_query($mysqli, $sql)){
				header('Location:dataabsen.php?nik='.$_GET['nik']);
			}
			else{
			   header('Location:index.php?hasil=Gagal update data');
			}

		}
	}
} elseif($aksi=="export"){
	if(isset($_GET['tanggal'])){
		$tanggal = date('Y-m', strtotime($_GET['tanggal']));
		$tgl = date('F-Y', strtotime($_GET['tanggal']));
	}else{
		$tanggal = date('Y-m');
		$tgl = date('F-Y');
	}
	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
	 
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=absen-".$tgl.".xls");
	 
	// Tambahkan table
	include 'tableabsen.php';
} elseif ($aksi=="aktif") {
	$sql="UPDATE karyawan SET aktif='1' WHERE nik='$nik'";
	if(mysqli_query($mysqli, $sql)){
		$user = mysqli_query($mysqli,"SELECT namapanggilan FROM karyawan WHERE nik='$nik'");
		$data = mysqli_fetch_array($user);
		$username = strtolower($data['namapanggilan']);
		$pass = md5($username);
		$sqli = "INSERT INTO loginuser(nik,username,password,level) VALUES ('$nik','$username','$pass','2')";
		if(mysqli_query($mysqli, $sqli)){
			header('Location:datapegawai.php?hasil=Berhasil mengubah data');
		} else {
			header('Location:datapegawai.php?hasil=Gagal mengubah data');	
		}
	}
	else{
		header('Location:datapegawai.php?hasil=Gagal mengubah data');
	}
}  elseif ($aksi=="nonaktif") {
	$sql="UPDATE karyawan SET aktif='0' WHERE nik=$nik";
	if(mysqli_query($mysqli, $sql)){
		$user = "DELETE FROM loginuser WHERE nik=$nik";
		if(mysqli_query($mysqli, $user)){
			header('Location:datapegawai.php?hasil=Berhasil mengubah data');
		} else {
			header('Location:datapegawai.php?hasil=Gagal mengubah data');	
		}
	}
	else{
	    header('Location:datapegawai.php?hasil=Gagal mengubah data');
	}
} elseif($aksi=="tambahposisi") {
	$sql="INSERT INTO karyawan_jabatan(nik,position) value(".$nik.",".$posisi.")";
	if(mysqli_query($mysqli, $sql)){
		header('Location:datapegawai.php?hasil=Berhasil mengubah data');
	} else {
		header('Location:datapegawai.php?hasil=Gagal mengubah data');	
	}
} elseif($aksi=="ubahposisi") {
	$sql="UPDATE karyawan_jabatan set position = ".$posisi." WHERE nik = '".$nik."'";
	if(mysqli_query($mysqli, $sql)){
		header('Location:datapegawai.php?hasil=Berhasil mengubah data');
	} else {
		header('Location:datapegawai.php?hasil=Gagal mengubah data');	
	}
} elseif($aksi=="tambah_jabatan") {
	$sql="INSERT INTO list_jabatan(position) VALUE('".$jabatan."')";
	if(mysqli_query($mysqli, $sql)){
		header('Location:list_jabatan.php?hasil=Berhasil menambah jabatan');
	} else {
		header('Location:list_jabatan.php?hasil=Gagal menambah jabatan');	
	}
} elseif($aksi=="hapus_jabatan") {
	$sql="UPDATE list_jabatan SET status=0 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header('Location:list_jabatan.php?hasil=Berhasil menghapus jabatan');
	} else {
		header('Location:list_jabatan.php?hasil=Gagal menghapus jabatan');	
	}
} elseif($aksi=="tambah_industri") {
	$sql="INSERT INTO customer_industry(code,industry_name) VALUE('".$code."','".$nama."')";
	if(mysqli_query($mysqli, $sql)){
		header('Location:list_industri.php?hasil=Berhasil menambah industri');
	} else {
		header('Location:list_industri.php?hasil=Gagal menambah industri');	
	}
} elseif($aksi=="hapus_industri") {
	$sql="UPDATE customer_industry SET status=0 WHERE id=".$id;
	if(mysqli_query($mysqli, $sql)){
		header('Location:list_industri.php?hasil=Berhasil menghapus industri');
	} else {
		header('Location:list_industri.php?hasil=Gagal menghapus industri');	
	}
}
?>
