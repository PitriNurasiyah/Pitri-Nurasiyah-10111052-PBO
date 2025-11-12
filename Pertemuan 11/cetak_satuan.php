<?php
include('koneksi.php');
$db = new database();
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");

if(isset($_GET['kode_barang'])){
    $kode = $_GET['kode_barang'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kd_barang='$kode'");
    $row = mysqli_fetch_array($data);
} else {
    die("Kode barang tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Detail Barang</title>
</head>
<body>
<h3>Laporan Detail Data Barang : <?php echo $row['nama_barang']; ?></h3>
<hr/>

<p><b>Kode Barang :</b> <?php echo $row['kd_barang']; ?></p>
<p><b>Nama Barang :</b> <?php echo $row['nama_barang']; ?></p>
<p><b>Stok :</b> <?php echo $row['stok']; ?></p>
<p><b>Harga Beli :</b> <?php echo $row['harga_beli']; ?></p>
<p><b>Harga Jual :</b> <?php echo $row['harga_jual']; ?></p>
<p><b>Keuntungan :</b> <?php echo $row['harga_jual'] - $row['harga_beli']; ?></p>

<script>
window.print();
</script>

</body>
</html>