<?php
include 'koneksi.php';
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Data Supplier</title>
</head>
<body>
    <title></title>
    <style type="text/css">
        form#background_border{
            margin: 0px 230px;
            color:white; 
        }
    </style>
</head>
</body>
 <h2>SELAMAT DATANG</h2>
 <div id="navigasi">
    <a href="index.php"><button>Data Barang</button></a> |
    <a href="tampil_customer.php"><button>Data Customer</button></a> |
    <a href="tampil_supplier.php"><button>Data Supplier</button></a> |
    <a href="login.php"><button>Logout</button></a>
</div>
<br>
    <form id="background_border" method="get">
        <input type="text" name="cari" placeholder="Cari Nama Supplier">
        <input type="submit" value="Cari">
    </form>
    </br>
    <a href="tambah_suplier.php"><button>Tambah Data</button></a>&nbsp;&nbsp;
    <a href="cetak_supplier.php" target="_BLANK"><button>Print Data Supplier</button></a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Telepon Supplier</th>
            <th>Email Supplier</th>
            <th>Password Supplier</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;

        if(isset($_GET['cari'])){
          
            $data_supplier = $db->cari_data_supplier($_GET['cari']);
            echo "<p>Hasil pencarian: " . $_GET['cari'] . "</p>";
        } else {
         
            $data_supplier = $db->tampil_data_supplier();
        }

        if (!empty($data_supplier)) {
            foreach($data_supplier as $row){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_supplier']; ?></td>
                <td><?php echo $row['nama_supplier']; ?></td>
                <td><?php echo $row['alamat_supplier']; ?></td>
                <td><?php echo $row['telepon_supplier']; ?></td>
                <td><?php echo $row['email_supplier']; ?></td>
                <td><?php echo $row['pass_supplier']; ?></td>
                <td>
                    <a href="edit_supplier.php?id_supplier=<?php echo $row['id_supplier']; ?>">Edit</a> | 
                    <a href="proses_supplier.php?action=delete&id_supplier=<?php echo $row['id_supplier']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='7'>Data tidak ditemukan.</td></tr>";
        }
        ?>
    </table>
    </br>
<form id="background_border" method="get" action="cetak_supplier.php" target="_BLANK">
        <input type="text" name="kode_barang" placeholder="Masukkan ID Supplier">
        <input type="submit" value="Print Data Satuan Supplier"> 
    </form>
<a href="login.php?action=logout"><input type="button" value="Keluar Aplikasi"></a>
</body>
</html>