<?php
session_start();
unset($_SESSION['email']);
session_destroy();

include "koneksi.php";
$tanggal = date('d/m/Y H:i:s');
	$status = $_SESSION["email"]. ' berhasil keluar.';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");

header("Location:index.php");
?>