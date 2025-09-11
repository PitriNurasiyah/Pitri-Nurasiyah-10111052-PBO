<?php
class Kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merek;

    function statusHarga()
    {
        if ($this->harga > 50000000) {
            $status = 'Mahal';
        } else {
            $status = 'Murah';
        }
        return $status;
    }
}

// Membuat objek kendaraan pertama
$objekKendaraan1 = new Kendaraan();
$objekKendaraan1->merek = "Yamaha MIO";
$objekKendaraan1->harga = 10000000;

// Membuat objek kendaraan kedua
$objekKendaraan2 = new Kendaraan();
$objekKendaraan2->merek = "Toyota Avanza";
$objekKendaraan2->harga = 100000000;

// Menampilkan informasi kendaraan kedua
echo "Merek: " . $objekKendaraan2->merek . "<br>";
echo "Nominal Harga: Rp. " . number_format($objekKendaraan2->harga, 0, ',', '.') . "<br>";
echo "Status Harga Kendaraan: " . $objekKendaraan2->statusHarga();
?>