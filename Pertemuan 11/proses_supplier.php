<?php
include 'koneksi.php'; 
$db = new database();

$action = $_GET['action'];

if ($action == "add") {
    $db->tambah_data_supplier(
        $_POST['id_supplier'],
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telepon_supplier'],
        $_POST['email_supplier'],
        $_POST['pass_supplier']
    );
    header("location:tampil_supplier.php");
    exit;

} elseif ($action == "edit") {
    $id_supplier = $_GET['id_supplier'];

    $db->edit_data_supplier(
        $id_supplier,
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telepon_supplier'],
        $_POST['email_supplier'],
        $_POST['pass_supplier']
    );
    header("location:tampil_supplier.php");
    exit;

} elseif ($action == "delete") {
    $id_supplier = $_GET['id_supplier'];
    $db->delete_data_supplier($id_supplier);
    header("location:tampil_supplier.php");
    exit;

} elseif ($action == "search") {
    $nama_supplier = $_POST['nama_supplier'];
    header("location:tampil_supplier.php?cari=" . urlencode($nama_supplier));
    exit;
}
?>