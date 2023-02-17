<?php
include "koneksi.php";

$years = $_POST["years"];
$harga = $_POST["harga"];

$cek = mysqli_query($koneksi,"INSERT INTO harga VALUES ('','$years','$harga')");

if($cek){
	echo "<script type='text/javascript'>alert('Berhasil');location='harga_klaim.php'</script>";

	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' berhasil memasukkan harga';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
else{
	echo "<script type='text/javascript'>alert('Gagal');location='harga_klaim.php'</script>";
	$tanggal = date('d/m/Y H:i:s');
	$status = $email. ' gagal memasukkan harga';

	$log_masuk = mysqli_query($koneksi,"INSERT INTO log_aktifitas VALUES ('$tanggal','$status')");
}
?>