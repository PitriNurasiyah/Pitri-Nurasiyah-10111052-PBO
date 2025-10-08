<?php
class GajiPokok_Karyawan {
    private $NamaKaryawan;
    private $golongan;
    private $jamlembur;
    private $gajipokok;
    private $totalGaji;

    public function __destruct() {
        echo "Destructor : Data Karyawan " . $this->NamaKaryawan . " telah dihapus dari memori.\n";
    }

    public function __construct($NamaKaryawan, $golongan, $jamlembur) {
        $this->NamaKaryawan = $NamaKaryawan;
        $this->golongan = $golongan;
        $this->jamlembur = $jamlembur;
        $this->setGajiPokok();
        $this->hitungTotalGaji();
        echo "Constructor : Data Karyawan '$this->NamaKaryawan' berhasil dibuat.\n";
    }

    public function setinfo($NamaKaryawan, $golongan, $jamlembur) {
        $this->NamaKaryawan = $NamaKaryawan;
        $this->golongan = $golongan;
        $this->jamlembur = $jamlembur;
        $this->setGajiPokok();
        $this->hitungTotalGaji();
    }

    public function getNamaKaryawan() { return $this->NamaKaryawan; }
    public function getgolongan() { return $this->golongan; }
    public function getjamlembur() { return $this->jamlembur; }
    public function getGajiPokok() { return $this->gajipokok; }
    public function getTotalGaji() { return $this->totalGaji; }

    private function setGajiPokok() {
        // daftar gaji per golongan
        $gajipergolongan = [
            "Ib" => 1250000,
            "Ic" => 1300000,
            "Id" => 1350000,
            "IIa" => 2000000,
            "IIb" => 2100000,
            "IIc" => 2200000,
            "IId" => 2300000,
            "IIIa" => 2400000,
            "IIIb" => 2500000,
            "IIIc" => 2600000,
            "IIId" => 2700000,
            "IVa" => 2800000,
            "IVb" => 2900000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];

        $this->gajipokok = $gajipergolongan[$this->golongan] ?? 0;
    }

    public function hitungTotalGaji() {
        // Besaran lembur tiap jam adalah Rp 15000
        $upahLembur = $this->jamlembur * 15000;
        $this->totalGaji = $this->gajipokok + $upahLembur;
    }
}

echo "Masukkan jumlah karyawan: ";
$jmlKaryawan = (int)trim(fgets(STDIN));

$daftarKaryawan = [];
for ($i = 1; $i <= $jmlKaryawan; $i++) {
    echo "\nData Karyawan ke-$i\n";
    echo "Nama Karyawan: "; $NamaKaryawan = trim(fgets(STDIN));
    echo "Golongan: "; $golongan = trim(fgets(STDIN));
    echo "Total Jam Lembur: "; $jamlembur = (int)trim(fgets(STDIN));

    $karyawan = new GajiPokok_Karyawan($NamaKaryawan, $golongan, $jamlembur);
    $daftarKaryawan[] = $karyawan;
}

echo "==========================================================\n";
echo "| Nama Karyawan  | Golongan | Total Jam Lembur | Total Gaji      |\n";
echo "==========================================================\n";

foreach ($daftarKaryawan as $karyawan) {
    echo $karyawan->getNamaKaryawan() . "\t\t";
    echo $karyawan->getgolongan() . "\t\t";
    echo $karyawan->getjamlembur() . "\t\t";
    echo "Rp " . $karyawan->getTotalGaji() . "\n";
}
echo "==========================================================\n";
echo "\n";
?>
