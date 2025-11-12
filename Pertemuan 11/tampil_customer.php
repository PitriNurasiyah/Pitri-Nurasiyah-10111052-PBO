<?php
include 'koneksi.php';
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Data Customer</title>
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
        <input type="text" name="cari" placeholder="Cari Nama Customer">
        <input type="submit" value="Cari">
    </form>
    </br>
    <a href="tambah_customer.php"><button>Tambah Data</button></a>&nbsp;&nbsp;
    <a href="cetak_costumer.php" target="_BLANK"><button>Print Data Customer</button></a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>ID Customer</th>
            <th>NIK Customer</th>
            <th>Nama Customer</th>
            <th>Jenis Kelamin</th>
            <th>Alamat Customer</th>
            <th>Telepon Customer</th>
            <th>Email Customer</th>
            <th>Password Customer</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        
        if(isset($_GET['cari'])){
            $data_customer = $db->cari_data_customer($_GET['cari']);
            echo "<p>Hasil pencarian: " . $_GET['cari'] . "</p>";
        } else {
            
            $data_customer = $db->tampil_data_customer();
        }
        
        if (!empty($data_customer)) {
            foreach($data_customer as $row){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['id_customer']; ?></td>
                <td><?php echo $row['nik_customer']; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['alamat_customer']; ?></td>
                <td><?php echo $row['telepon_customer']; ?></td>
                <td><?php echo $row['email_customer']; ?></td>
                <td><?php echo $row['pass_customer']; ?></td>
                <td>
                    <a href="edit_customer.php?id_customer=<?php echo $row['id_customer']; ?>">Edit</a> | 
                    <a href="proses_customer.php?action=delete&id_customer=<?php echo $row['id_customer']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='9'>Data tidak ditemukan.</td></tr>";
        }
        ?>
    </table>
    </br>
    <form id="background_border" method="get" action="cetak_customer.php" target="_BLANK">
        <input type="text" name="kode_barang" placeholder="Masukkan ID Customer">
        <input type="submit" value="Print Data Satuan Customer"> 
    </form>
<a href="login.php?action=logout"><input type="button" value="Keluar Aplikasi"></a>
</body>
</html>