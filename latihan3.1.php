<?php

class BarangHarian{
    var $namabarang = "Mie Instan";
    var $harga;
    var $jumlah;
    var $total;

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
$barang1 -> harga = 15000;
$barang1 -> jumlah = 3;

$barang2 = new BarangHarian();
$barang2 -> namabarang = "Kopi";
$barang2 -> harga = 3000;
$barang2 -> jumlah = 5;

$barang3 = new BarangHarian();
$barang3 -> namabarang = "Air Mineral";
$barang3 -> harga = 5000;
$barang3 -> jumlah = 5;

echo "Nama Barang : " . $barang1 -> namabarang; echo "<br>";
echo "Harga : Rp. " . $barang1 -> harga; echo "<br>";
echo "Jumlah : " . $barang1 -> jumlah; echo "<br>";
echo "Total : Rp. " . $barang1 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang1 -> statusPembayaran(); echo "<br>"; echo "<br>";

echo "Nama Barang : " . $barang2 -> namabarang; echo "<br>";
echo "Harga : Rp. " . $barang2 -> harga; echo "<br>";
echo "Jumlah : " . $barang2 -> jumlah; echo "<br>";
echo "Total : Rp. " . $barang2 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang2 -> statusPembayaran(); echo "<br>"; echo "<br>";

echo "Nama Barang : " . $barang3 -> namabarang; echo "<br>";
echo "Harga : Rp. " . $barang3 -> harga; echo "<br>";
echo "Jumlah : " . $barang3 -> jumlah; echo "<br>";
echo "Total : Rp. " . $barang3 -> hitungTotalPembayaran(); echo "<br>";
echo "Status : " . $barang3 -> statusPembayaran(); echo "<br>"; echo "<br>";

?>
