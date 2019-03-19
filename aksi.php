<?php

$error=''; 

include "index/connectdb.php";

if(isset($_POST['submit']))	{
	$username   = $_POST['username'];
	$password   = md5($_POST['password']);
	$query = mysqli_query($mysqli, "SELECT * FROM loginuser WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($query) == 0) {
	    $error = "Username or Password is invalid"; 
	} else {
	    if($row = mysqli_fetch_assoc($query)) {
	    	session_start();
		    $_SESSION['nik']=$row['nik'];
		    $_SESSION['level'] = $row['level'];
		    header("Location:index/index.php");
	        } else {
	        $error = "Failed Login";
	    }
	}
}
elseif(isset($_POST['pass'])) {
	$nik   = $_POST['nik'];
	$password   = md5($_POST['password']);
	$passwordbaru1 = md5($_POST['passwordbaru1']);
	$passwordbaru2 = md5($_POST['passwordbaru2']);
	$query = mysqli_query($mysqli, "SELECT * FROM loginuser WHERE nik='$nik' AND password='$password'");
	if(mysqli_num_rows($query) == 0) {
	    $error = "Password yang anda masukkan salah";
	} else {
		if ($passwordbaru1==$passwordbaru2) {
			$query = mysqli_query($mysqli, "UPDATE loginuser SET password='$passwordbaru1' WHERE nik='$nik'");
			header("Location:index.php");
		} else {
			$error = "Password baru tidak sesuai";
		}
	    
	}
}
?>