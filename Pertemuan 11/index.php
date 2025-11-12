<?php
include ('koneksi.php');
$db = new database();
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");

// fitur cari
if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $cari = $_GET['cari'];
    $data_barang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$cari%'");
} else {
    $data_barang = mysqli_query($koneksi, "SELECT * FROM tb_barang");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        form#background_border{
            margin: 0px 230px;
            color:white; 
        }
    </style>
</head>
<body>
    <h2>SELAMAT DATANG</h2>
    <div id="navigasi">
    <a href="index.php"><button>Data Barang</button></a> |
    <a href="tampil_customer.php"><button>Data Customer</button></a> |
    <a href="tampil_supplier.php"><button>Data Supplier</button></a> |
    <a href="login.php"><button>Logout</button></a>
</div>
<br>

    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Barang">
        <input type="submit" value="Cari">
    </form>
    <a href="tambah_data.php"><button>Tambah Data</button></a>&nbsp;&nbsp;
    <a href="cetak.php" target="_BLANK"><button>Print Data Barang</button></a>

    <?php
    if (isset($_GET['cari']) && $_GET['cari'] != '') {
        echo "<b>Hasil pencarian : " . htmlspecialchars($_GET['cari']) . "</b>";
    }
    ?>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data_barang)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['kd_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
            <td>
                <a href="edit_data.php?id_barang=<?php echo $row['id_barang']; ?>&action=edit">Edit</a> |
                <a href="proses_barang.php?id_barang=<?php echo $row['id_barang']; ?>&action=delete">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <br>
    
    <form id="background_border" method="get" action="cetak_satuan.php" target="_BLANK">
        <input type="text" name="kode_barang" placeholder="Masukkan Kode Barang">
        <input type="submit" value="Print Satuan Barang"> 
    </form>

    <a href="login.php?action=logout"><input type="button" value="Keluar Aplikasi"></a>
</body>
</html>
