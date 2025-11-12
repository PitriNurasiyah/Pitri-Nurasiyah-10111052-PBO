<?php
include 'koneksi.php';
$db = new database();

// Pastikan ada ID yang dikirim melalui URL
if (!isset($_GET['id_supplier'])) {
    header('location:tampil_supplier.php');
}

// Ambil data supplier yang akan diedit
$data_edit = $db->tampil_edit_supplier($_GET['id_supplier']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
</head>
<body>
    <h3>Form Edit Data Supplier</h3>
    <form method="post" action="proses_supplier.php?action=edit&id_supplier=<?php echo $data_edit['id_supplier']; ?>">
        <table>
            <tr>
                <td>ID Supplier</td>
                <td>:</td>
                <td><input type="text" name="id_supplier" value="<?php echo $data_edit['id_supplier']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td>:</td>
                <td><input type="text" name="nama_supplier" value="<?php echo $data_edit['nama_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat Supplier</td>
                <td>:</td>
                <td><textarea name="alamat_supplier" required><?php echo $data_edit['alamat_supplier']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telepon Supplier</td>
                <td>:</td>
                <td><input type="text" name="telepon_supplier" value="<?php echo $data_edit['telepon_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Email Supplier</td>
                <td>:</td>
                <td><input type="email" name="email_supplier" value="<?php echo $data_edit['email_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td>Password Supplier</td>
                <td>:</td>
                <td><input type="password" name="pass_supplier" value="<?php echo $data_edit['pass_supplier']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Update Data">
                    <a href="tampil_supplier.php"><input type="button" value="Kembali"></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>