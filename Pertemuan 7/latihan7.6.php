<?php
interface Hewan {
// Membuat Interface : sebuah class definition yang didalam body hanya terdiri dari definisi fungsi tanpa ada implementasi
    public function Makan();
    public function Bergerak();
    public function Beranak();
}

// Class Burung Implements Hewan
class Burung implements Hewan {
    public function Makan() {
        return "Burung makan biji-bijian<br/>";
    }

    public function Bergerak() {
        return "Burung bergerak dengan berjalan, terbang dan melompat<br/>";
    }

    public function Beranak() {
        return "Burung beranak dengan bertelur<br/>";
    }
}

// Class Kambing Implements Hewan
class Kambing implements Hewan {
    public function Makan() {
        return "Kambing makan rumput<br/>";
    }

    public function Bergerak() {
        return "Kambing bergerak dengan berjalan dan berlari<br/>";
    }

    public function Beranak() {
        return "Kambing beranak dengan melahirkan<br/>";
    }
}

$burung = new Burung;
$kambing = new Kambing;

echo "<b>Perilaku Burung : </b><br/>";
echo $burung->Makan();
echo $burung->Bergerak();
echo $burung->Beranak();

echo "<br/>";
echo "<b>Perilaku Kambing : </b><br/>";
echo $kambing->Makan();
echo $kambing->Bergerak();
echo $kambing->Beranak();
?>