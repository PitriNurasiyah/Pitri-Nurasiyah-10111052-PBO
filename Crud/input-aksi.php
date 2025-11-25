<?php
include 'koneksi.php';

// Menghilangkan fungsi debugging tambahan (ini_set, error_reporting, mysqli_report) yang mungkin tidak diperlukan untuk fungsionalitas dasar, tetapi dipertahankan jika Anda ingin mengaktifkannya.
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$pekerjaan = $_POST['pekerjaan'];

mysqli_query($koneksi, "INSERT INTO user (nama, alamat, pekerjaan) VALUES ('$nama', '$alamat', '$pekerjaan')");

header("location:index.php?pesan=input");
?>