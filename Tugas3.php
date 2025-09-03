<?php
class Pembeli {
    private $nama;
    private $kartuMember;
    private $totalBelanja;
    private $diskon = 0 ;

    public function setNama($nama) {
        $this->nama = $nama;
    }
    public function getNama() {
        return $this->nama;
    }

    public function setKartuMember($status) {
        $this->kartuMember = $status;
    }
    public function getKartuMember() {
        return $this->kartuMember;
    }

    public function setTotalBelanja($total) {
        $this->totalBelanja = $total;
    }
    public function getTotalBelanja() {
        return $this->totalBelanja;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }
    public function getDiskon() {
        return $this->diskon;
    }


    public function hitungDiskon() {
        if ($this->kartuMember) {
            if ($this->totalBelanja > 500000) {
                $this->diskon = 50000;
            } elseif ($this->totalBelanja > 100000) {
                $this->diskon = 15000;
            } else {
                $this->diskon = 0;
            }
        } else {
            if ($this->totalBelanja > 100000) {
                $this->diskon = 5000;
            } else {
                $this->diskon = 0;
            }
        }
    }
}

$pembeli1 = new Pembeli();
$pembeli1->setNama("Pembeli 1");
$pembeli1->setKartuMember(true);
$pembeli1->setTotalBelanja(200000);
$pembeli1->setDiskon(15000);
$pembeli1->hitungDiskon();
$totalBayar1 = $pembeli1->getTotalBelanja() - $pembeli1->getDiskon();

$pembeli2 = new Pembeli();
$pembeli2->setNama("Pembeli 2");
$pembeli2->setKartuMember(true);
$pembeli2->setTotalBelanja(570000);
$pembeli2->setDiskon(50000);
$pembeli2->hitungDiskon();
$totalBayar2 = $pembeli2->getTotalBelanja() - $pembeli2->getDiskon();

$pembeli3 = new Pembeli();
$pembeli3->setNama("Pembeli 3");
$pembeli3->setKartuMember(false);
$pembeli3->setTotalBelanja(120000);
$pembeli3->setDiskon(5000);
$pembeli3->hitungDiskon();
$totalBayar3 = $pembeli3->getTotalBelanja() - $pembeli3->getDiskon();

$pembeli4 = new Pembeli();
$pembeli4->setNama("Pembeli 4");
$pembeli4->setKartuMember(false);
$pembeli4->setTotalBelanja(90000);
$pembeli4->setDiskon(0);
$pembeli4->hitungDiskon();
$totalBayar4 = $pembeli4->getTotalBelanja() - $pembeli4->getDiskon();

echo "Nama : " . $pembeli1 -> getNama(); echo "<br>";
echo "Apakah ada kartu member: " . ($pembeli1->getKartuMember() ? "ya" : "tidak") . "<br>";
echo "Total belanja: Rp " . $pembeli1->getTotalBelanja() . "<br>";
echo "Diskon : Rp " . $pembeli1->getDiskon() . "<br>";
echo "Total bayar: Rp " . $totalBayar1 . "<br>"; echo "<br>";

echo "Nama : " . $pembeli2 -> getNama(); echo "<br>";
echo "Apakah ada kartu member: " . ($pembeli2->getKartuMember() ? "ya" : "tidak") . "<br>";
echo "Total belanja: Rp " . $pembeli2->getTotalBelanja() . "<br>";
echo "Diskon : Rp " . $pembeli2->getDiskon() . "<br>";
echo "Total bayar: Rp " . $totalBayar2 . "<br>"; echo "<br>";

echo "Nama : " . $pembeli3 -> getNama(); echo "<br>";
echo "Apakah ada kartu member: " . ($pembeli3->getKartuMember() ? "ya" : "tidak") . "<br>";
echo "Total belanja: Rp " . $pembeli3->getTotalBelanja() . "<br>";
echo "Diskon : Rp " . $pembeli3->getDiskon() . "<br>";
echo "Total bayar: Rp " . $totalBayar3 . "<br>"; echo "<br>";

echo "Nama : " . $pembeli4 -> getNama(); echo "<br>";
echo "Apakah ada kartu member: " . ($pembeli4->getKartuMember() ? "ya" : "tidak") . "<br>";
echo "Total belanja: Rp " . $pembeli4->getTotalBelanja() . "<br>";
echo "Diskon : Rp " . $pembeli4->getDiskon() . "<br>";
echo "Total bayar: Rp " . $totalBayar4 . "<br>"; echo "<br>";
?>
