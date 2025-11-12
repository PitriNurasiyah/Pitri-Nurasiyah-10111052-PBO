<?php
include('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
<title>Form Tambah Data Barang</title>
<style type="text/css">
.formbackground_border {
    margin: 0px 500px;
    color: black;
}
.form#print_satuan {
    margin: 0px 250px;
    color: white;
}
.posisi_tombol {
    margin: 0px 200px;
}
.tombol_login {
    background: #47C0D8;
    color: white;
    font-size: 11pt;
    border: none;
    padding: 8px 20px;
    cursor: pointer;
}
* {
    font-family: "Trebuchet MS";
}
h1 {
    text-transform: uppercase;
    color: #47C0D8;
}
table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    width: 50%;
    margin: 10px auto;
}
table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #333639;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
    text-decoration: none;
}
table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
a {
    background-color: #47C0D8;
    color: #fff;
    padding: 7px;
    text-decoration: none;
    font-size: 12px;
}
</style>
</head>
<body>
<center><h1>Form Tambah Data Barang</h1></center>

<?php
// Kode barang otomatis
$kode_barang_terakhir = $db->kode_barang(); // misalnya fungsi ini ambil data terakhir dari DB

if ($kode_barang_terakhir) {
    // Misal kode terakhir berbentuk BRG/05
    $pecahdata = explode('/', $kode_barang_terakhir['kd_barang']);
    $no_urut = intval($pecahdata[1]) + 1;
    $kode_barang_baru = "BRG/" . str_pad($no_urut, 2, "0", STR_PAD_LEFT);
} else {
    $kode_barang_baru = "BRG/01"; // default kalau belum ada data
}
?>

<form method="post" action="proses_barang.php?action=add" enctype="multipart/form-data">
<table>
<tr>
    <td>Kode Barang</td>
    <td>:
        <input type="text" name="kd_barang" value="<?php echo $kode_barang_baru; ?>" readonly>
    </td>
</tr>
<tr>
    <td>Nama Barang</td>
    <td>:
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
    </td>
</tr>
<tr>
    <td>Stok</td>
    <td>:
        <input type="number" name="stok" placeholder="Stok" required>
    </td>
</tr>
<tr>
    <td>Harga Beli</td>
    <td>:
        <input type="number" name="harga_beli" placeholder="Harga Beli" required>
    </td>
</tr>
<tr>
    <td>Harga Jual</td>
    <td>:
        <input type="number" name="harga_jual" placeholder="Harga Jual" required>
    </td>
</tr>
<tr>
    <td>Gambar Barang</td>
    <td>:
        <input type="file" name="gambar_produk" accept=".png,.jpg,.jpeg" required>
        <span style="color: red;">(Ekstensi yang diperbolehkan: .png | .jpg | .jpeg)</span>
    </td>
</tr>
<tr>
    <td></td>
    <td>
        <input type="submit" class="tombol_login" name="tombol" value="Simpan">
        <a href="tampil_barang.php">Kembali</a>
    </td>
</tr>
</table>
</form>

</body>
</html>
