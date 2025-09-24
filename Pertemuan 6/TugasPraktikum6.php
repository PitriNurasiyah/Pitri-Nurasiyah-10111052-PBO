<?php
class GajiPokok_Karyawan{
    private $NamaKaryawan;
    private $golongan;
    private $jamlembur;
    private $gajipokok;
    private $totalGaji;

    public function __destruct() {
    echo "Destructor : Data Karyawan " . $this->NamaKaryawan . " telah dihapus dari memori.\n";
    }

    public function __construct($NamaKaryawan, $golongan, $jamlembur) {
        $this->Nama = $NamaKaryawan;
        $this->golongan = $golongan;
        $this->jamlembur = $jamlembur;
        $this->getgajipokok();
        $this->hitungTotalGaji();
        echo "constructor : Data Karyawan '$this->NamaKaryawan' berhasil dibuat .\n";
    }

    public function setinfo($NamaKaryawan, $golongan, $jamlembur) {
        $this->NamaKaryawan = $NamaKaryawan;
        $this->golongan = $golongan;
        $this->jamlembur = $jamlembur;
        $this->getgajipokok();
        $this->hitungTotalGaji();
}

    public function getNamaKaryawan() {return $this->NamaKaryawan;}
    public function getgolongan() {return $this->golongan;}
    public function getjamlembur() {return $this->jamlembur;}
    public function getGajiPokok() {return $this->gajipokok;}
     public function getTotalGaji() {return $this->totalGaji;}

    private function setGajiPokok() {
        switch ($this->gajipergolongan) {
            case "Ib" : $this->gajiPokok = 1250000;
            case "Ic" : $this->gajiPokok = 1300000;
            case "Id" : $this->gajiPokok = 1350000;
            case "IIa" : $this->gajiPokok = 2000000;
            case "IIb" : $this->gajiPokok = 2100000;
            case "IIc" : $this->gajiPokok = 2200000;
            case "IId" : $this->gajiPokok = 2300000; 
            case "IIIa" : $this->gajiPokok = 2400000;
            case "IIIb" : $this->gajiPokok = 2500000;
            case "IIIc" : $this->gajiPokok = 2600000;
            case "IIId" : $this->gajiPokok = 2700000;
            case "IVa" : $this->gajiPokok = 2800000;
            case "IVb" : $this->gajiPokok = 2900000;
            case "IVc" : $this->gajiPokok = 3000000;
            case "IVd" : $this->gajiPokok = 3100000;
            default:     $this->gajiPokok = 0;
        };
        $this->gajipokok = $gajipergolongan[$this->golongan] ?? 0;
    }

    public function hitungTotalGaji() {
        // 3. Besaran lembur tiap jam adalah Rp 15000
        $upahLembur = $this->jamlembur * 15000;
        $this->totalGaji = $this->gajipokok + $upahLembur;
    }
}

echo "Masukkan jumlah karyawan: ";
$jmlKaryawan = (int)trim(fgets(STDIN));

$daftarKaryawan = [];
for ($i = 1; $i <= $jmlKaryawan; $i++) {
    echo "\nData Karyawan ke-$i\n";
    echo "Nama Karyawan: "; $namaKaryawan = trim(fgets(STDIN));
    echo "Golongan: "; $golongan = trim(fgets(STDIN));
    echo "Total Jam Lembur: "; $totalJamLembur = (int)trim(fgets(STDIN));

$karyawan = new GajiPokok_Karyawan($NamaKaryawan, $golongan, $jamLembur);
$daftarKaryawan[] = $karyawan;
}

echo "==========================================================\n";
echo "| Nama Karyawan  | Golongan | Total Jam Lembur | Total Gaji      |\n";
echo "==========================================================\n";

foreach ($daftarKaryawan as $karyawan) {
echo $karyawan->getNamaKaryawan() . "\t\t";
echo $karyawan->getgolongan() . "\t\t";
echo $karyawan->getjamLembur() . "\t\t";
echo "Rp " . $karyawan->getTotalGaji() . "\n";
}
echo "==========================================================\n";
echo "\n";

?>