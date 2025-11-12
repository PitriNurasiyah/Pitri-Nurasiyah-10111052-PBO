<?php
include 'koneksi.php';
$db = new database();

// Pastikan ada ID yang dikirim melalui URL
if (!isset($_GET['id_customer'])) {
    header('location:tampil_customer.php');
}

// Ambil data customer yang akan diedit
$data_edit = $db->tampil_edit_customer($_GET['id_customer']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Customer</title>
</head>
<body>
    <h3>Form Edit Data Customer</h3>
    <form method="post" action="proses_customer.php?action=edit&id_customer=<?php echo $data_edit['id_customer']; ?>">
        <table>
            <tr>
                <td>ID Customer</td>
                <td>:</td>
                <td><input type="text" name="id_customer" value="<?php echo $data_edit['id_customer']; ?>" readonly></td>
            </tr>
            <tr>
                <td>NIK Customer</td>
                <td>:</td>
                <td><input type="text" name="nik_customer" value="<?php echo $data_edit['nik_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td><input type="text" name="nama_customer" value="<?php echo $data_edit['nama_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jenis_kelamin" required>
                        <option value="Laki-laki" <?php if($data_edit['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if($data_edit['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat Customer</td>
                <td>:</td>
                <td><textarea name="alamat_customer" required><?php echo $data_edit['alamat_customer']; ?></textarea></td>
            </tr>
            <tr>
                <td>Telepon Customer</td>
                <td>:</td>
                <td><input type="text" name="telepon_customer" value="<?php echo $data_edit['telepon_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Email Customer</td>
                <td>:</td>
                <td><input type="email" name="email_customer" value="<?php echo $data_edit['email_customer']; ?>" required></td>
            </tr>
            <tr>
                <td>Password Customer</td>
                <td>:</td>
                <td><input type="password" name="pass_customer" value="<?php echo $data_edit['pass_customer']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Update Data">
                    <a href="tampil_customer.php"><input type="button" value="Kembali"></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>