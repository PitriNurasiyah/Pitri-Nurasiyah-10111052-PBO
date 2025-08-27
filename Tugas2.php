<?php
    $besaran_pinjaman = 1000000;
    $besar_bunga = 10;
    $lama_angsuran_bulan = 5;
    $keterlambatan_hari = 40;
    $denda_harian = 0.0015; 


$total_pinjaman = $besaran_pinjaman + ($besaran_pinjaman * $besar_bunga / 100);
$besaran_angsuran = $total_pinjaman / $lama_angsuran_bulan;
$dendaperhari = 0.0015 * $besaran_angsuran;
$denda_keterlambatan = $besaran_angsuran * $denda_harian * $keterlambatan_hari;
$besaran_pembayaran = $besaran_angsuran + $denda_keterlambatan;


echo "TOKO PEGADAIAN SYARIAH <br>";
echo "Besaran Pinjaman: Rp " . number_format($besaran_pinjaman, 0, ',', '.') . "<br>";
echo "Besaran Bunga : Rp " . number_format($besar_bunga) . "<br>";
echo "Total Pinjaman (dengan bunga): Rp " . number_format($total_pinjaman, 0, ',', '.') . "<br>";
echo "Lama Angsuran : " . $lama_angsuran_bulan . "<br>";
echo "Besaran Angsuran per bulan: Rp " . number_format($besaran_angsuran, 0, ',', '.') . "<br>";
echo "Keterlambatan Angsuran: " . $keterlambatan_hari . "<br>\n";
echo "Denda PerHari : Rp " . number_format($dendaperhari) . "<br>";
echo "Denda Keterlambatan: Rp " . number_format($denda_keterlambatan, 0, ',', '.') . "<br>";
echo "Total Pembayaran (angsuran + denda): Rp " . number_format($besaran_pembayaran, 0, ',', '.') . "<br>";
?>