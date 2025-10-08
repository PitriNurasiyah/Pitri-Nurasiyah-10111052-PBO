<?php
class SimpananPelajar {
    private $saldo;
    private $nama;
    private $PIN;

    public function __construct($nama, $saldoAwal, $PIN) {
        $this->nama = $nama;
        $this->saldo = $saldoAwal;
        $this->PIN = $PIN;
    }

    public function cekPIN($PIN) {
        return $this->PIN === $PIN;
        }

    public function TambahSaldo($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah + ($jumlah*0.05);
            echo "Setor tunai berhasil: Rp. " . number_format($jumlah, 0, ',', '.') . "\n";
        } else {
            echo "Jumlah setor harus positif!\n";
        }
    }

    public function AmbilUang($jumlah) {
        if ($jumlah <= 0) {
            echo "Jumlah tarik harus positif1\n";
        }
        else if ($jumlah > $this->saldo) {
            echo "====== Saldo tidak mencukupi! =====\n";
        }
        else {
            $this->saldo -= $jumlah;
            echo "Tarik tunai berhasil: Rp. " . number_format($jumlah, 0, ',', '.') . "\n";
        }
    }

    public function getSaldo() {
        return $this->saldo;
    }
    public function getNama() {
        return $this->nama;
    }

    public function getPIN() {
        return $this->PIN;
    }
}

class Tabungan extends SimpananPelajar {
    private $nama;
    private $PIN;

    public function __construct($nama, $saldoAwal, $PIN) {
        parent::__construct($nama, $saldoAwal, $PIN);
        $this->nama = $nama;
    }

    public function tampilkanSaldo() {
        echo "Saldo {$this->nama}: Rp" . number_format($this->getSaldo(), 0, ',', '.') . "\n";
    }

    public function setorTunai($jumlah) {
        $this->TambahSaldo($jumlah);
    }

    public function tarikTunai($jumlah) {
        $this->AmbilUang($jumlah);
    }
}

function bacaInput($pesan) {
    echo $pesan;
    return trim(fgets(STDIN));
}

// Fungsi untuk membaca pilihan menu valid (1-4)
function bacaPilihanMenu() {
    while (true) {
        $input = bacaInput(">> Pilih menu (1-4): ");
        if (in_array($input, ['1', '2', '3', '4',])) {
            return $input;
        } else {
            echo "Pilihan tidak valid. Silakan coba lagi.\n";
        }
    }
}

// Fungsi untuk baca ID siswa valid
function bacaIdSiswa($max, $tabungan) {
    while (true) {
        echo "Daftar Siswa:\n";
        foreach ($tabungan as $index => $obj) {
            echo ($index + 1) . ". " . $obj->getnama() . " (Saldo: Rp" . number_format($obj->getSaldo(), 0, ',', '.') . ")\n";
        }

        $input = bacaInput(">> Pilih siswa (1-$max): ");
        if (ctype_digit($input)) {
            $num = $input;
            if ($num >= 1 && $num <= $max) {
                return $num - 1; // array index mulai dari 0
            }
        }
        echo "Input tidak valid. Masukkan angka antara 1 sampai $max.\n";
    }
}

function bacaJumlah($pesan) {
    while (true) {
        $input = bacaInput($pesan);
        if (ctype_digit($input) && $input > 0) {
            return $input;
        }
        echo "Jumlah harus berupa angka positif.\n";
    }
}
function verifikasiPIN($tabungan, $id) {
    $percobaan = 3;
    while ($percobaan > 0) {
        $pinInput = bacaInput(">> Masukkan PIN {$tabungan[$id]->getNama()}: ");
        if ($tabungan[$id]->cekPIN($pinInput)) {
            return true;
        } else {
            return false;
        }
    }
        echo "silahkan masukkan kembali PIN $percobaan\n";
}

$Tabungan = [
    new Tabungan("Nasabah1 : Aditya Hafidz", 500000, 12345),
    new Tabungan("Nasabah2 : Eko Nugroho", 1200000, 122),
    new Tabungan("Nasabah3 : Dani Abdul",  750000, 1244),
];

echo "=== Program Tabungan Sekolah ===\n";

while (true) {
    echo "====== Menu =====\n";
    echo "1. Tampilkan Saldo\n";
    echo "2. Tambah Saldo\n";
    echo "3. Ambil uang\n";
    echo "4. Kembali\n";

    $pilihan = bacaPilihanMenu();

    if ($pilihan == '4') {
        $konfirmasi = strtolower(bacaInput("Kembali? (y/n) : "));
        if ($konfirmasi === 'y') {
            break;
    }
}

    switch ($pilihan) {
        case '1':
            echo "=====Daftar Nasabah=====\n";
            foreach ($Tabungan as $obj) {
                $obj->tampilkanSaldo();
            }
            break;

        case '2':
            $id = bacaIdSiswa(count($Tabungan), $Tabungan);
            $jumlahSetor = bacaJumlah(">> Masukkan jumlah setor: Rp");
            $Tabungan[$id]->TambahSaldo($jumlahSetor);
            break;

        case '3':
            $id = bacaIdSiswa(count($Tabungan), $Tabungan);
            $jumlahTarik = bacaJumlah(">> Masukkan jumlah tarik: Rp");
            $Tabungan[$id]->AmbilUang($jumlahTarik);
            break;
       }
   }

// Tampilkan rekap saldo akhir di terminal
echo "\n------------------------------\n";
echo "==== Rekap Saldo Akhir Pelajar ====\n";
foreach ($Tabungan as $emp) {
    echo $emp->getNama() . "Rp. " . number_format($emp->getSaldo(), 0, ',', '.') . "\n";
}
echo "------------------------------\n";

?>