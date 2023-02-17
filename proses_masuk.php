<?php
error_reporting(0);
include "koneksi.php";
$email = $_POST["email"];
$kata_sandi = md5($_POST["kata_sandi"]);

$query = mysqli_query($koneksi,"SELECT*FROM admin WHERE email='$email' AND kata_sandi='$kata_sandi'");
$cek = mysqli_fetch_array($query);

if($email == $cek['email'] AND $kata_sandi==$cek['kata_sandi']){
	session_start();
	$_SESSION["email"] = $cek['email'];
	$kata_sandi = $cek['kata_sandi'];


	echo "<script type='text/javascript'>alert('Berhasil');location='home_admin.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' berhasil login';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
else{
	echo "<script type='text/javascript'>alert('Gagal');location='masuk_admin.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' gagal login';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
?>
