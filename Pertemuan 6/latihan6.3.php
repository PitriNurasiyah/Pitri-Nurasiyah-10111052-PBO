<?php
class KonversiSuhu {
    private $celcius;
    private $reamur;
    private $fahrenheit;
    private $kelvin;

    public function __construct($celcius) {
        if (is_numeric($celcius)){
            $this->celcius = $celcius;
            $this->hitungsuhu();
        }
        else {
            $this->celcius = 0;
            $this->reamur = 0;
            $this->fahrenheit = 0;
            $this->kelvin = 0;
        }
    }
     private function hitungSuhu() {
        $this->reamur = $this->celcius * 4/5;
        $this->fahrenheit = ($this->celcius * 9/5) + 32;
        $this->kelvin = $this->celcius + 273.15;
    }
    public function getSuhu() {
        // Deklarasi array untuk menampung data suhu
        $dataSuhu = array(
            'celcius' => $this->celcius,
            'reamur' => $this->reamur,
            'fahrenheit' => $this->fahrenheit,
            'kelvin' => $this->kelvin
        );
        return $dataSuhu;
    }
}
$inputSuhu = $_GET['suhu'] ?? 36;
// Buat objek dari class KonversiSuhu dengan nilai dari GET
$suhu = new KonversiSuhu($inputSuhu);
// Ambil data suhu yang sudah dikonversi
$hasilKonversi = $suhu->getSuhu();

echo "suhu dalam celcius = " . number_format($hasilKonversi['celcius'], 0) . " derajat <br>";
echo "suhu dalam kelvin = " . number_format($hasilKonversi['kelvin'], 2) . " derajat <br>";
echo "suhu dalam fahrenheit = " . number_format($hasilKonversi['fahrenheit'], 2) . " derajat <br>";
echo "suhu dalam reamur = " . number_format($hasilKonversi['reamur'], 2) . " derajat <br>";
echo "Sekian konversi suhu yang bisa dilakukan";
?>

