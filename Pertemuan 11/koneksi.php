<?php
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop2";
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if(mysqli_connect_error()){
            echo "Koneksi database gagal : ".mysqli_connect_error();
        }
    }

    function tampil_data(){
        $data = mysqli_query($this->koneksi, "select * from tb_barang");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tambah_data($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        mysqli_query($this->koneksi, "insert into tb_barang values ('', '$kd_barang', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')");
    }

    function tampil_edit_data($id_barang){
        $data = mysqli_query($this->koneksi, "select * from tb_barang where id_barang='$id_barang'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual){
        mysqli_query($this->koneksi, "update tb_barang set nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' where id_barang='$id_barang'");
    }

     function delete_data($id_barang){
        mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
    }

    function kode_barang(){
        $data = mysqli_query($this->koneksi, "SELECT MAX(kd_barang) as kd_barang FROM tb_barang");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    function tampil_data_customer(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return @$hasil;
    }

    function tambah_data_customer($id_customer, $nik_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer){
        mysqli_query($this->koneksi, "INSERT INTO tb_customer 
            VALUES ('$id_customer', '$nik_customer', '$nama_customer', '$jenis_kelamin', '$alamat_customer', '$telepon_customer', '$email_customer', '$pass_customer')");
    }

    function tampil_edit_customer($id_customer){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer WHERE id_customer='$id_customer'");
        return mysqli_fetch_array($data); // Langsung return 1 baris array asosiatif
    }

    function edit_data_customer($id_customer, $nik_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer){
        mysqli_query($this->koneksi, "UPDATE tb_customer SET 
            nik_customer='$nik_customer', nama_customer='$nama_customer', jenis_kelamin='$jenis_kelamin', 
            alamat_customer='$alamat_customer', telepon_customer='$telepon_customer', email_customer='$email_customer', 
            pass_customer='$pass_customer' 
            WHERE id_customer='$id_customer'");
    }

    function delete_data_customer($id_customer){
        mysqli_query($this->koneksi, "DELETE FROM tb_customer WHERE id_customer='$id_customer'");
    }

    function cari_data_customer($nama_customer){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_customer WHERE nama_customer LIKE '%$nama_customer%'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return @$hasil;
    }

    function kode_customer(){
        $data = mysqli_query($this->koneksi, "SELECT MAX(id_customer) as kode FROM tb_customer");
        $row = mysqli_fetch_array($data);
        
        $maxKode = $row['kode'];
        $urutan = (int) substr($maxKode, 3, 4);
        $urutan++;
        $huruf = "CST";
        $kodeBaru = $huruf . sprintf("%04s", $urutan);
        
        return $kodeBaru;
    }
    function tampil_data_supplier(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return @$hasil;
    }

    function tambah_data_supplier($id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier){
        mysqli_query($this->koneksi, "INSERT INTO tb_supplier 
            VALUES ('$id_supplier', '$nama_supplier', '$alamat_supplier', '$telepon_supplier', '$email_supplier', '$pass_supplier')");
    }

    function tampil_edit_supplier($id_supplier){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id_supplier'");
        return mysqli_fetch_array($data); // Langsung return 1 baris array asosiatif
    }

    function edit_data_supplier($id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier){
        mysqli_query($this->koneksi, "UPDATE tb_supplier SET 
            nama_supplier='$nama_supplier', alamat_supplier='$alamat_supplier', telepon_supplier='$telepon_supplier', 
            email_supplier='$email_supplier', pass_supplier='$pass_supplier' 
            WHERE id_supplier='$id_supplier'");
    }

    function delete_data_supplier($id_supplier){
        mysqli_query($this->koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$id_supplier'");
    }

    function cari_data_supplier($nama_supplier){
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier WHERE nama_supplier LIKE '%$nama_supplier%'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return @$hasil;
    }

    function kode_supplier(){
        $data = mysqli_query($this->koneksi, "SELECT MAX(id_supplier) as kode FROM tb_supplier");
        $row = mysqli_fetch_array($data);
        
        $maxKode = $row['kode'];
        $urutan = (int) substr($maxKode, 4, 4);
        $urutan++;
        $huruf = "SUPP";
        $kodeBaru = $huruf . sprintf("%04s", $urutan);
        
        return $kodeBaru;
    }
}
?>