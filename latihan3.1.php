<?php

class BarangHarian{
    var $namabarang = "Mie Instan";
    var $harga;
    var $jumlah;
    var $total;

    function setNamaBarang($namabarang){
        $this->namabarang = $namabarang;
    }
     function getNamaBarang() {
        return $this->namabarang;
    }

    function setharga($harga) {
        $this->harga = $harga;
    }
    function getHarga() {
        return $this->harga;
    }

    function setJumlah($jumlah) {
        $this->jumlah = $jumlah;
    }
    function getJumlah() {
        return $this->jumlah;
    }

    
    function hitungTotalPembayaran() {
        $total = $this->harga * $this->jumlah;
        return $total;
    }
    
    function statusPembayaran(){
        if ($this->total  > 50000) {
            return  "Mahal" ;
        } else {
            return "Murah";
        }
    }
}

$barang1 = new BarangHarian();
$barang1 -> setharga(15000);
$barang1 -> setJumlah (3);

$barang2 = new BarangHarian();
$barang2 -> setNamaBarang ("Kopi");
$barang2 -> setharga(3000);
$barang2 -> setJumlah (5);

$barang3 = new BarangHarian();
$barang3 -> setNamaBarang ("Air Mineral");
$barang3 -> setharga (5000);
$barang3 -> setJumlah(5);



echo "Nama Barang : " . $barang1 -> getNamaBarang(); echo "<br>";
echo "Harga : Rp. " . $barang1 -> getHarga(); echo "<br>";
echo "Jumlah : " . $barang1 -> getJumlah(); echo "<br>";
echo "Total : Rp. " . $barang1 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang1 -> statusPembayaran(); echo "<br>"; echo "<br>";

echo "Nama Barang : " . $barang2 -> getNamaBarang(); echo "<br>";
echo "Harga : Rp. " . $barang2 -> getHarga(); echo "<br>";
echo "Jumlah : " . $barang2 -> getJumlah(); echo "<br>";
echo "Total : Rp. " . $barang2 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang2 -> statusPembayaran(); echo "<br>"; echo "<br>";

echo "Nama Barang : " . $barang3 -> getNamaBarang(); echo "<br>";
echo "Harga : Rp. " . $barang3 -> getHarga(); echo "<br>";
echo "Jumlah : " . $barang3 -> getJumlah(); echo "<br>";
echo "Total : Rp. " . $barang3 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang3 -> statusPembayaran(); echo "<br>"; echo "<br>";


?>
