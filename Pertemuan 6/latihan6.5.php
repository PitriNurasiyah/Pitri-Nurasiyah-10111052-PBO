<?php

echo "Siapa nama kamu: ";
$input_nama = fopen("php://stdin", "r"); //stdin otomatis menyimpan string 
$nama = trim(fgets($input_nama));

echo "Hello $nama, apa kabar?\n";

?>