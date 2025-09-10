<?php
class Kendaraan {
    private $merek;
    private $jmlroda;
    private $harga;
    private $warna;
    private $bhnbakar;
    private $tahun;

    public function setMerek($m) {
        $this->merek = $m;
    }
    public function setJmlRoda($j) {
        $this->jmlroda = $j;
    }
    public function setHarga($h) {
        $this->harga = $h;
    }
    public function setWarna($w) {
        $this->warna = $w;
    }
    public function setBhnBakar($b) {
        $this->bhnbakar = $b;
    }
    public function setTahun($t) {
        $this->tahun = $t;
    }


    public function getMerek() {
        return $this->merek;
    }
    public function getJmlRoda() {
        return $this->jmlroda;
    }
    public function getHarga() {
        return $this->harga;
    }
    public function getWarna() {
        return $this->warna;
    }
    public function getBhnBakar() {
        return $this->bhnbakar;
    }
    public function getTahun() {
        return $this->tahun;
    }

    // Method tambahan
    public function statusHarga() {
        return ($this->harga > 100000000) ? "Mahal" : "Murah";
    }

    public function dapatSubsidi() {
        return ($this->tahun < 2000) ? "Dapat subsidi" : "Tidak dapat subsidi";
    }

    public function hargaSecondKendaraan() {
        return $this->harga * 0.7;
    }
}

$Data1 = array('Toyota Yaris','4','160000000','Merah','Pertamax','2014');
$Data2 = array('Honda Scoopy','2','15000000','Putih','Premium','2005');
$Data3 = array('Isuzu Panther','4','40000000','Hitam','Solar','1994');

for($i = 1; $i <= 3; $i++) {
    ${"kendaraan$i"} = new Kendaraan();
    ${"kendaraan$i"}->setMerek(${"Data$i"}[0]);
    ${"kendaraan$i"}->setJmlRoda(${"Data$i"}[1]);
    ${"kendaraan$i"}->setHarga(${"Data$i"}[2]);
    ${"kendaraan$i"}->setWarna(${"Data$i"}[3]);
    ${"kendaraan$i"}->setBhnBakar(${"Data$i"}[4]);
    ${"kendaraan$i"}->setTahun(${"Data$i"}[5]);
}

for($i = 1; $i <= 3; $i++) {
    echo "kendaraan$i<br>"
        . ${"kendaraan$i"}->getMerek() . "<br>"
        . ${"kendaraan$i"}->getJmlRoda() . "<br>"
        . ${"kendaraan$i"}->getHarga() . "<br>"
        . ${"kendaraan$i"}->getWarna() . "<br>"
        . ${"kendaraan$i"}->getBhnBakar() . "<br>"
        . ${"kendaraan$i"}->getTahun() . "<br>"
        . ${"kendaraan$i"}->statusHarga() . "<br>"
        . ${"kendaraan$i"}->dapatSubsidi() . "<br>"
        . ${"kendaraan$i"}->hargaSecondKendaraan() . "<br><br>";
}
?>