<?php
include('koneksi.php');

$db = new database();
$koneksi = $db->koneksi;

$row = null;

if(isset($_GET['nama_barang'])){
    $nama = mysqli_real_escape_string($koneksi, $_GET['nama_barang']);
    
    $data = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE LOWER(nama_barang) = LOWER('$nama')");
    
    if(mysqli_num_rows($data) > 0){
        $row = mysqli_fetch_array($data);
    } else {
        die("Data barang dengan nama **" . htmlspecialchars($nama) . "** tidak ditemukan!");
    }
    
} else {
    die("Nama barang tidak ditemukan di URL!");
}

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 2, ',', '.');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Detail Barang</title>
<style>
    body { font-family: sans-serif; }
    table { width: 50%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
    th { background-color: #f2f2f2; }
</style>
</head>
<body>
<h3>Laporan Detail Data Barang </h3>
<hr/>

<table>
    <tr>
        <th>Kode Barang</th>
        <td><?php echo $row['kd_barang']; ?></td>
    </tr>
    <tr>
        <th>Nama Barang</th>
        <td><?php echo $row['nama_barang']; ?></td>
    </tr>
    <tr>
        <th>Stok</th>
        <td><?php echo $row['stok']; ?></td>
    </tr>
    <tr>
        <th>Harga Beli</th>
        <td><?php echo formatRupiah($row['harga_beli']); ?></td>
    </tr>
    <tr>
        <th>Harga Jual</th>
        <td><?php echo formatRupiah($row['harga_jual']); ?></td>
    </tr>
    <tr>
        <th>Keuntungan</th>
        <td><?php echo formatRupiah($row['harga_jual'] - $row['harga_beli']); ?></td>
    </tr>
    <tr>
        <th>Gambar Produk</th>
        <td style="text-align: center;">
            <?php if($row['gambar_produk'] != "") { ?>
                <img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px; border: 1px solid #ccc; padding: 5px;">
            <?php } else {
                echo "Tidak ada gambar";
            } ?>
        </td>
    </tr>
</table>

<script>
window.print();
</script>

</body>
</html>