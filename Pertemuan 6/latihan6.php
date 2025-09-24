<?php

class belanja{
public $namaBarang;
public $harga;
public $jumlah;
public $total;

public function __destruct(){
echo "Destructor : Data belanja '$this->namaBarang' berhasil dihapus \n";
}

public function __construct($namaBarang, $harga, $jumlah){
    $this->namaBarang = $namaBarang;
    $this->harga = $harga;
    $this->jumlah = $jumlah;
    $this->total = $this->harga * $this->jumlah;
    echo "constructor : Data belanja '$this->namaBarang' berhasil dibuat .\n";
}
public function getinfo() {
return $this->namaBarang . " (" . $this->harga . " x " . $this->jumlah . ") = " . $this->total;
}
}

echo "masukkan jumlah barang yang dibeli : ";
$jml = (int)trim(fgets(STDIN));

$barang = [];
$totalbelanja = 0;

for ($i =1; $i<=$jml; $i++){
echo "\nBarang ke-$i\n";
echo "Nama Barang : "; $namaBarang = trim(fgets(STDIN));
echo "Harga Satuan : "; $harga = (int)trim(fgets(STDIN));
echo "Jumlah Beli : "; $jumlah = (int)trim(fgets(STDIN));

$mie = new belanja($namaBarang, $harga, $jumlah);
$barang[] = $mie;
$totalbelanja += $mie->total;
}

echo "----------------Daftar Belanja----------------\n";
foreach($barang as $item){
    echo $item->getinfo() . "\n";
}
echo "---------------------------------------------\n";
echo "Total Belanja anda adalah : $totalbelanja\n";

?>