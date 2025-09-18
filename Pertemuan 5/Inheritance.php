<?php
// Materi Inheritance, Overloading, dan Overriding
class warung{
    public $namabarang;
    public $harga;

    public function __construct($namabarang, $harga) {
        $this->namabarang = $namabarang;
        $this->harga = $harga;
    }
    public function informasi(){
        echo "Barang : $this->namabarang, Harga : Rp $this->harga<br/>";
    }
}

class warung2 extends warung{
    public $exp;
    public function __construct($namabarang, $harga, $exp) {
        parent ::__construct($namabarang, $harga);
        $this->exp = $exp;
    }

//Overriding
    public function informasi(){
        echo "Barang2: $this->namabarang, Harga: Rp $this->harga, Kadaluarsa: $this->exp<br/>";
    }
}

//Overloading
class warung3 {
    public function __call($namabarang, $x) {    //($namabarang) dalam kurung disebut method
        if ($namabarang == "total") { //$total adalah method
            if (count($x) == 1 ) { //jumlah parameternya hanya 1
                return $x [0];
            }
            else if (count($x) == 2 ) {
                return $x [0] * $x [1];
            }
        }
    }   
}

$barang1 = new warung("susu kotak", 6000);
$barang1->informasi();

$barang2 = new warung2("Yogurt", 12000, "15-11-2025"); //Overriding
$barang2->informasi();

$barang3 = new warung3(); //contoh Overloading
echo "Harga Indomie setelah diskon : Rp " . $barang3->total(4000) . "<br>";
echo "Harga Telur : Rp " . $barang3->total(2000, 5);
?>