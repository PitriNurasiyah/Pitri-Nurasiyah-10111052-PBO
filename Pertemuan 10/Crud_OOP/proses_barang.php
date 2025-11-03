<?php
include('koneksi.php');

$koneksi = new database();

$action = $_GET['action'];

if($action == "login"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // proses login menggunakan method dari class database
    if($koneksi->login_user($username, $password)){
        header('location: index.php?pesan=Selamat%20Datang');
    } else {
        header('location: login.php?msg=Login gagal! Username atau password salah.');
    }

} else if($action == "logout"){
    // proses logout
    $koneksi->logout_user();

}else if($action == "add"){
    $koneksi->tambah_data($_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header('location: index.php');

} else if($action == "edit"){
    $koneksi->edit_data($_POST['id_barang'], $_POST['nama_barang'], $_POST['stok'], $_POST['harga_beli'], $_POST['harga_jual']);
    header('location: index.php');

} else if($action == "delete"){
    $id_barang = $_GET['id_barang'];
    $koneksi->delete_data($id_barang);
    header('location: index.php');

} else if($action == "search"){
    $nama_barang = $_POST['nama_barang'];
    $koneksi->cari_data($nama_barang);
    header('location: cari_data.php');
}
?>