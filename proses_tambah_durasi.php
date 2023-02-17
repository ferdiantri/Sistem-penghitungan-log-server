<?php
include "koneksi.php";

$years = $_POST["years"];
$min_durasi = $_POST["min_durasi"];

$cek = mysqli_query($koneksi,"INSERT INTO min_dur VALUES ('','$years','$min_durasi')");

if($cek){
	echo "<script type='text/javascript'>alert('Berhasil');location='durasi_klaim.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' berhasil memasukkan durasi klaim';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
else{
	echo "<script type='text/javascript'>alert('Gagal');location='durasi_klaim.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' gagal memasukkan durasi klaim';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
?>