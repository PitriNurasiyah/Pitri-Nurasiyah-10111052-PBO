<?php
include 'koneksi.php';
$db = new database();

// Generate kode customer otomatis
$kode_customer_baru = $db->kode_customer();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Customer</title>
</head>
<body>
    <h3>Form Tambah Data Customer</h3>
    <form method="post" action="proses_customer.php?action=add">
        <input type="hidden" name="id_customer" value="<?php echo $kode_customer_baru; ?>"> 
        <table>
            <tr><td>ID Customer</td><td>:</td><td><input type="text" value="<?php echo $kode_customer_baru; ?>" readonly></td></tr>
            <tr><td>NIK Customer</td><td>:</td><td><input type="text" name="nik_customer" required></td></tr>
            <tr><td>Nama Customer</td><td>:</td><td><input type="text" name="nama_customer" required></td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td><select name="jenis_kelamin" required><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select></td></tr>
            <tr><td>Alamat Customer</td><td>:</td><td><textarea name="alamat_customer" required></textarea></td></tr>
            <tr><td>Telepon Customer</td><td>:</td><td><input type="text" name="telepon_customer" required></td></tr>
            <tr><td>Email Customer</td><td>:</td><td><input type="email" name="email_customer" required></td></tr>
            <tr><td>Password Customer</td><td>:</td><td><input type="password" name="pass_customer" required></td></tr>
            <tr><td></td><td></td><td><input type="submit" value="Simpan"><a href="tampil_customer.php"><input type="button" value="Kembali"></a></td></tr>
        </table>
    </form>
</body>
</html>