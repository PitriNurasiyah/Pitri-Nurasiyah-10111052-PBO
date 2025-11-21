<?php
    class database{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "belajar_oop3";
        var $koneksi = "";

        function __construct()
        {
            $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            if(mysqli_connect_error()){
                echo "Koneksi database gagal : ". mysqli_connect_error();
            }
        }

        function tampil_data()
        {
            $data = mysqli_query($this->koneksi,"select * from tb_barang");
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }

        function tambah_data($kd_barang,$nama_barang,$stok,$harga_beli,$harga_jual,$gambar_produk)
        {
            //cek dulu jika ada gambar produk jalankan coding ini
            if($gambar_produk != "") {
                $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload
                $x = explode('.', $gambar_produk); //memisahkan nama file gambar sesuai dengan ekstensi yang diupload
                $ekstensi = strtolower(end($x));
                $file_tmp = $_FILES['gambar_produk']['tmp_name'];
                $angka_acak = rand(1,999);
                $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
                
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO tb_barang (id_barang,kd_barang,nama_barang,stok,harga_beli,harga_jual,gambar_produk) VALUES ('','$kd_barang','$nama_barang', '$stok', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
                    $result = mysqli_query($this->koneksi, $query);
                    // periksa query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan : ".mysqli_errno($this->koneksi).
                             " - ".mysqli_error($this->koneksi));
                    } else {
                        //tampil alert dan akan redirect ke index.php
                        echo "<script>alert('Data berhasil ditambah.');window.location='tampil.php';</script>";
                    }

                } else {
                    //jika file ekstensi tidak jpg png jpeg ttini yang tampil
                    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='tambah_data.php';</script>";
                }

            } else { //jika tidak ada gambar maka akan menjalankan perintah dibawah ini
                $query = "INSERT INTO tb_barang (id_barang,kd_barang,nama_barang,stok,harga_beli,harga_jual,gambar_produk) VALUES ('','$kd_barang','$nama_barang', '$stok', '$harga_beli', '$harga_jual', null)";
                $result = mysqli_query($this->koneksi, $query);
                // periksa query apakah ada error
                if(!$result){
                    die ("Query gagal dijalankan : ".mysqli_errno($this->koneksi).
                         " - ".mysqli_error($this->koneksi));
                } else {
                    //tampil alert dan akan redirect ke index.php
                    echo "<script>alert('Data berhasil ditambah.');window.location='tampil.php';</script>";
                }
            }
        }

        function tampil_edit_data($id_barang)
{
    $data = mysqli_query($this->koneksi,"select * from tb_barang where id_barang='$id_barang'");
    while($row = mysqli_fetch_array($data)){
        $hasil[] = $row;
    }
    return $hasil;
}

function edit_data($id_barang,$nama_barang,$stok,$harga_beli,$harga_jual,$gambar_produk)
{
    //jalankan apabila terdapat gambar edit yang di upload
    if($gambar_produk != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload
        $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar

            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE tb_barang SET nama_barang = '$nama_barang', stok = '$stok', harga_beli = '$harga_beli', harga_jual = '$harga_jual', gambar_produk = '$nama_gambar_baru'";
            $query .= "WHERE id_barang = '$id_barang'";
            $result = mysqli_query($this->koneksi, $query);
            // periksa query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan : ".mysqli_errno($this->koneksi).
                     " - ".mysqli_error($this->koneksi));
            } else {
                //tampil alert dan akan redirect ke halaman index.php
                //silahkan ganti index.php sesuai halaman yang akan dituju
                echo "<script>alert('Data berhasil diubah.');window.location='tampil.php';</script>";
            }

        } else {
            //Jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png.');window.location='edit_data.php';</script>";
        }

    } else {
        // jalankan UPDATE jika tidak ada gambar edit yg di upload
        $query  = "UPDATE tb_barang SET nama_barang = '$nama_barang', stok = '$stok', harga_beli = '$harga_beli', harga_jual = '$harga_jual'";
        $query .= "WHERE id_barang = '$id_barang'";
        $result = mysqli_query($this->koneksi, $query);
        // periksa query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan : ".mysqli_errno($this->koneksi).
                 " - ".mysqli_error($this->koneksi));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            echo "<script>alert('Data berhasil diubah.');window.location='tampil.php';</script>";
        }
    }
}

public function cari_data($cari, $kriteria){
    $data = mysqli_query($this->koneksi,
        "SELECT * FROM tb_barang WHERE $kriteria LIKE '%$cari%'"
    );

    $hasil = [];
    while($d = mysqli_fetch_array($data)){
        $hasil[] = $d;
    }

    return $hasil;
}

function delete_data($id_barang)
{
    mysqli_query($this->koneksi, "delete from tb_barang where id_barang='$id_barang'");
}
function kode_barang(){
		$data = mysqli_query($this->koneksi,"SELECT MAX(kd_barang) as kd_barang FROM tb_barang");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function satuan_print($nama_barang){
		$data = mysqli_query($this->koneksi,"select * from tb_barang where nama_barang='$nama_barang'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

	function login($username,$password){
		$username = $_POST['username'];
		$password = $_POST['password'];
		//menyeleksi data admin dengan username dan password yang sesuai
		$data = mysqli_query($this->koneksi,"select * from user where username='$username' and password='$password'");
		//menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($data);
		//echo $cek;

		if($cek > 0){
			$d = mysqli_fetch_array($data);
			$_SESSION['username'] = $username;
			$_SESSION['tipe_user'] = $d['tipe_user'];
			header("Location:tampil.php?pesan=Selamat Datang ".$d['tipe_user']);
		}else{
			header("Location:index.php?pesan=gagal login");
		}

	}

	function logout(){
		unset($_SESSION['username']);
		session_unset();
		session_destroy();

		header("Location:index.php");
	}

    function tampil_data_paginated($start, $limit) {
    $data = mysqli_query($this->koneksi,"SELECT * FROM tb_barang LIMIT $start, $limit");
 
    return $data; 
    }
}
?>
