<?php
class BangunRuang {
    var $nama;
    var $sisi;
    var $jarijari;
    var $tinggi;
    
    public function setData($nama, $sisi, $jarijari, $tinggi) {
        $this->nama = $nama;
        $this->sisi = $sisi;
        $this->jarijari = $jarijari;
        $this->tinggi = $tinggi;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getSisi() {
        return $this->sisi;
    }

    public function getJarijari() {
        return $this->jarijari;
    }

    public function getTinggi() {
        return $this->tinggi;
    }

    // Hitung volume berdasarkan jenis bangun
    public function hitungVolume() {
        switch ($this->nama) {
            case "Bola":
                return (4/3) * pi() * pow ($this->jarijari, 3);
            case "Kerucut":
                return (1/3) * pi() * pow($this->jarijari, 2) * $this->tinggi;
            case "Limas Segi Empat":
                return (1/3) * pow($this->sisi, 2) * $this->tinggi;
            case "Kubus":
                return pow($this->sisi, 3);
            case "Tabung":
                return pi() * pow($this->jarijari, 2) * $this->tinggi;
            default:
                return 0;
        }
    }
}

// Array data bangun ruang
$dataBangun = [
    ["Bola", 0, 7, 0],
    ["Kerucut", 0, 14, 10],
    ["Limas Segi Empat", 8, 0, 24],
    ["Kubus", 30, 0, 0],
    ["Tabung", 0, 7, 10],
];

// Tampilkan data per baris
echo "=== Daftar Volume Bangun Ruang ===<br><br>";

foreach ($dataBangun as $item) {
    $obj = new BangunRuang();
    $obj->setData($item[0], $item[1], $item[2], $item[3]);

    echo "Jenis Bangun Ruang : " . $obj->getNama() . "<br>";
    echo "Sisi               : " . $obj->getSisi() . "<br>";
    echo "Jari-jari          : " . $obj->getJarijari() . "<br>";
    echo "Tinggi             : " . $obj->getTinggi() . "<br>";
    echo "Volume             : " . $obj->hitungVolume() . "<br>";
    echo "------------------------------<br>";
}
?>