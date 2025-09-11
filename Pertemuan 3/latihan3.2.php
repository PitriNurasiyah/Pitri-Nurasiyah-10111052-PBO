<?php
class kendaraan {
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merek;
    var $tahun;

    function statusHarga() {
        if ($this ->harga > 50000000) $status = "Mahal";
        else $status = "Murah";
        return $status;
    }

    function setMerek($x) {
        $this -> merek = $x;
    }

    function setHarga($x) {
        $this -> harga = $x;
    }

      function setjumlahRoda($x) {
        $this -> jumlahRoda = $x;
    }

      function setwarna($x) {
        $this -> warna = $x;
    }

      function setbahanBakar($x) {
        $this -> bahanBakar = $x;
    }

      function setTahun($x) {
        $this -> tahun = $x;
    }
}

 $kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Toyota Yaris');
$kendaraan1->setjumlahRoda(4);
$kendaraan1->setHarga(160000000);
$kendaraan1->setWarna("Merah");
$kendaraan1->setbahanBakar("Premium");
$kendaraan1->setTahun(2005);
$kendaraan1->statusHarga();

$kendaraan2 = new Kendaraan();
$kendaraan2->setMerek('Honda Scoopy');
$kendaraan2->setjumlahRoda(2);
$kendaraan2->setHarga(13000000);
$kendaraan2->setWarna("Putih");
$kendaraan2->setbahanBakar("Premium");
$kendaraan2->setTahun(2004);
$kendaraan2->statusHarga();

$kendaraan3 = new Kendaraan();
$kendaraan3->setMerek('Isuzu Panther');
$kendaraan3->setjumlahRoda(4);
$kendaraan3->setHarga(170000000);
$kendaraan3->setWarna("Hitam");
$kendaraan3->setbahanBakar("Solar");
$kendaraan3->setTahun(2003);
$kendaraan3->statusHarga();
  
echo "Merek : " . $kendaraan1->merek;
echo "<br/>";
echo "Jumlah Roda : " . $kendaraan1->jumlahRoda;
echo "<br/>";
echo "Harga : " . $kendaraan1->harga;
echo "<br/>";
echo "Warna : " . $kendaraan1->warna;
echo "<br/>";
echo "Bahan Bakar : " . $kendaraan1->bahanBakar;
echo "<br/>";
echo "Tahun : " . $kendaraan1->tahun;
echo "<br/>";
echo "Status Harga : " . $kendaraan1->statusHarga();
echo "<br/>"; echo "<br/>";

echo "Merek : " . $kendaraan2->merek;
echo "<br/>";
echo "Jumlah Roda : " . $kendaraan2->jumlahRoda;
echo "<br/>";
echo "Harga : " . $kendaraan2->harga;
echo "<br/>";
echo "Warna : " . $kendaraan2->warna;
echo "<br/>";
echo "Bahan Bakar : " . $kendaraan2->bahanBakar;
echo "<br/>";
echo $kendaraan2->tahun;
echo "<br/>";
echo "Status Harga : " . $kendaraan1->statusHarga();
echo "<br/>"; echo "<br/>";

echo "Merek : " . $kendaraan3->merek;
echo "<br/>";
echo "Jumlah Roda : " . $kendaraan3->jumlahRoda;
echo "<br/>";
echo "Harga : " . $kendaraan3->harga;
echo "<br/>";
echo "Warna : " . $kendaraan3->warna;
echo "<br/>";
echo "Bahan Bakar : " . $kendaraan3->bahanBakar;
echo "<br/>";
echo "Tahun : " . $kendaraan3->tahun;
echo "<br/>";
echo "Status Harga : " . $kendaraan1->statusHarga();
echo "<br/>"; echo "<br/>";

?>