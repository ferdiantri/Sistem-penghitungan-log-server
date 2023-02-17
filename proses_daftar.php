<?php
session_start();
error_reporting(0);
include "koneksi.php";
$nama = $_POST["nama"];
$email = $_POST["email"];
$kata_sandi = md5($_POST["kata_sandi"]);

$cek = mysqli_query($koneksi,"SELECT * FROM admin WHERE email='$email'");
$arc = mysqli_fetch_array($cek);
if($arc['email'] == $email){
	echo "<script type='text/javascript'>alert('Email Telah Dipakai');location='daftar_admin.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $_SESSION["email"]. ' gagal daftar admin '. $email . ' , ' . $nama;

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
else{
	$query = mysqli_query($koneksi,"INSERT INTO admin VALUES ('','$nama','$email','$kata_sandi')");
	echo "<script type='text/javascript'>alert('Berhasil');location='home_admin.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $_SESSION["email"]. ' berhasil daftar admin '. $email . ' , ' . $nama;

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
?>
