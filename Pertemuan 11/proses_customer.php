<?php
include 'koneksi.php'; 
$db = new database();

$action = $_GET['action'];

if ($action == "add") {
    $db->tambah_data_customer(
        $_POST['id_customer'],
        $_POST['nik_customer'],
        $_POST['nama_customer'],
        $_POST['jenis_kelamin'],
        $_POST['alamat_customer'],
        $_POST['telepon_customer'],
        $_POST['email_customer'],
        $_POST['pass_customer']
    );

    header("location:tampil_customer.php");
    exit;

} elseif ($action == "edit") {
    $id_customer = $_GET['id_customer'];

    $db->edit_data_customer(
        $id_customer,
        $_POST['nik_customer'],
        $_POST['nama_customer'],
        $_POST['jenis_kelamin'],
        $_POST['alamat_customer'],
        $_POST['telepon_customer'],
        $_POST['email_customer'],
        $_POST['pass_customer']
    );
    header("location:tampil_customer.php");
    exit;

} elseif ($action == "delete") {
    $id_customer = $_GET['id_customer'];
    $db->delete_data_customer($id_customer);
    header("location:tampil_customer.php");
    exit;

} elseif ($action == "search") {
    $nama_customer = $_POST['nama_customer'];
    header("location:tampil_customer.php?cari=" . urlencode($nama_customer));
    exit;
}
?>