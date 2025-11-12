<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include('koneksi.php');
$sdb = new database();
$data_barang = $sdb->tampil_data();
$koneksi = mysqli_connect("localhost", "root", "", "belajar_oop");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        form#background_border {
            margin: 0px 230px;
            color: white;
        }
    </style>
</head>
<body>
    <a href="tambah_data.php"><input type="button" value="Tambah Data"></a>
    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang">
        <input type="submit" value="Cari">
    </form>

    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : " . $cari . "</b>";
    }
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data_barang as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
            <td>
                <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a>
                <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>

    <br><br>
    <a href="proses_barang.php?action=logout"><input type="button" value="Keluar Aplikasi"></a>

</body>
</html>