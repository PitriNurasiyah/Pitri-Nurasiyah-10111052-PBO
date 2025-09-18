<?php
class Employee{
    public $Nama;
    public $LamaKerja;
    public $Gajipokok;
    
    public function __construct($Nama, $LamaKerja, $Gajipokok) {
        $this->Nama = $Nama;
        $this->LamaKerja = $LamaKerja;
        $this->Gajipokok = $Gajipokok;
}
    public function hitung_gaji() {
        return $this->Gajipokok;
    }

    public function informasi() {
        echo "Nama Programmer: " . $this->Nama . "<br/>";
        echo "Lama Kerja : " . $this->LamaKerja . "<br/>";
        echo "Gaji Pokok: Rp " . number_format($this->Gajipokok) . "<br/>";
        echo "Gaji awal : Rp " . number_format($this->Gajipokok) . "<br/>";
        echo "Total Gaji : Rp " . number_format($this->hitung_gaji()) . "<br/><br/>";
    }
}

class Programmer extends Employee{
    public function hitung_gaji() {
        $gaji = $this->Gajipokok;
        if ($this->LamaKerja >= 1 && $this->LamaKerja <= 10) {
            $bonus = 0.01 * $this->LamaKerja * $this->Gajipokok;
            $gaji += $bonus;
        }
        else if ($this->LamaKerja > 10 ) {
            $bonus = 0.02 * $this->LamaKerja * $this->Gajipokok;
            $gaji += $bonus;
        }
        return $gaji;
    }
}

class Direktur extends Employee{
    public function hitung_gaji() {
        $bonus = 0.5 * $this->LamaKerja * $this->Gajipokok;
        $tunjangan = 0.1 * $this->LamaKerja * $this->Gajipokok;
        return $this->Gajipokok + $bonus + $tunjangan;
    }

    public function informasi() {
        echo "Nama Direktur: " . $this->Nama . "<br/>";
        echo "Lama Kerja : " . $this->LamaKerja . "<br/>";
        echo "Gaji Pokok: Rp " . number_format($this->Gajipokok) . "<br/>";
        echo "Gaji awal : Rp " . number_format($this->Gajipokok) . "<br/>";
        echo "Total Gaji : Rp " . number_format($this->hitung_gaji()) . "<br/><br/>";
    }   
}

class Pegawai_Mingguan extends Employee{
     public $hargabarang;
    public $totalTerjual;
    public $stokBarang;

    public function __construct($Nama, $LamaKerja, $Gajipokok, $hargabarang, $totalTerjual, $stokBarang) {
        parent::__construct($Nama, $LamaKerja, $Gajipokok);
        $this->hargabarang = $hargabarang;
        $this->totalTerjual = $totalTerjual;
        $this->stokBarang = $stokBarang;
    }

    public function hitungGaji() {
        $persenJual = $this->totalTerjual / $this->stokBarang;

        if ($persenJual > 0.7) {
            $bonus = 0.1 * $this->hargabarang * $this->totalTerjual;
        } else {
            $bonus = 0.3 * $this->hargabarang * $this->totalTerjual;
        }

        return $this->Gajipokok + $bonus;
    }

    public function informasi() {
        echo "Nama Pegawai Mingguan : " . $this->Nama . "<br/>";
        echo "Stock Barang : " . $this->stokBarang . "<br/>";
        echo "Harga Barang : Rp " . number_format ($this->hargabarang) . "<br/>";
        echo "Total Terjual : " . $this->totalTerjual . "<br/>";
        echo "Total Gaji : Rp " . number_format($this->hitung_gaji()) . "<br/><br/>";
    }   
}


class Hitung {
    public function __call($hargabarang, $x) {
        if ($hargabarang == "total") {
            if (count($x) == 1) {
                return $x[0];
            } elseif (count($x) == 2) {
                return $x[0] * $x[1];
            }
        }
    }
}

$pegawai1 = new Programmer("Rina", 5, 5000000);
$pegawai1->informasi();

$direktur = new Direktur("Susi", 8, 10000000);
$direktur->informasi();

$pegawaiMingguan1 = new Pegawai_Mingguan("Joko", 2, 3000000, 100000,80, 100);
$pegawaiMingguan1->informasi();

$pegawaiMingguan2 = new Pegawai_Mingguan("Ayu", 2, 3000000, 100000, 60, 100);
$pegawaiMingguan2->informasi();

?>