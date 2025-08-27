<?php
Class Mobil {
    var $jumlahRoda=4;
    var $warna="Merah";
    var $bahanBakar="Pertamax";
    var $harga=120000000;
    var $merek='A';

    public function getJumlahRoda(){
        return "$this->jumlahRoda";
    }
}
    

$object1 = new Mobil();
$object2 = new Mobil();

echo $object1 ->getJumlahRoda();

?>
