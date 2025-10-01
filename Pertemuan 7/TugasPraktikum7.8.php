<?php
class UangTabungan {
    protected $saldo;

    public function __construct($saldoAwal) {
        if ($saldoAwal < 0) {
            $saldoAwal = 0;
        }
        $this->saldo = $saldoAwal;
    }

    public function setor($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Setor tunai berhasil: Rp" . number_format($jumlah, 0, ',', '.') . "\n";
        } else {
            echo "Jumlah setor harus positif!\n";
        }
    }

    public function tarik($jumlah) {
        if ($jumlah <= 0) {
            echo "Jumlah tarik harus positif!\n";
        }
        else if ($jumlah > $this->saldo) {
            echo "Saldo tidak mencukupi!\n";
        }
        else {
            $this->saldo -= $jumlah;
            echo "Tarik tunai berhasil: Rp" . number_format($jumlah, 0, ',', '.') . "\n";
        }
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

class Tabungan extends UangTabungan {
    private $nama;

    public function __construct($nama, $saldoAwal) {
        parent::__construct($saldoAwal);
        $this->nama = $nama;
    }

    public function tampilkanSaldo() {
        echo "Saldo {$this->nama}: Rp" . number_format($this->getSaldo(), 0, ',', '.') . "\n";
    }

    public function setorTunai($jumlah) {
        $this->setor($jumlah);
    }

    public function tarikTunai($jumlah) {
        $this->tarik($jumlah);
    }

    public function getNama() {
        return $this->nama;
    }
}

// Fungsi untuk baca input dari CLI
function bacaInput($pesan) {
    echo $pesan;
    return trim(fgets(STDIN));
}

// Fungsi untuk membaca pilihan menu valid (1-4)
function bacaPilihanMenu() {
    while (true) {
        $input = bacaInput(">> Pilih menu (1-4): ");
        if (in_array($input, ['1', '2', '3', '4'])) {
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
            echo ($index + 1) . ". " . $obj->getNama() . " (Saldo: Rp" . number_format($obj->getSaldo(), 0, ',', '.') . ")\n";
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

// Fungsi untuk baca jumlah uang (positif)
function bacaJumlah($pesan) {
    while (true) {
        $input = bacaInput($pesan);
        if (ctype_digit($input) && $input > 0) {
            return $input;
        }
        echo "Jumlah harus berupa angka positif.\n";
    }
}

// Program utama
$tabungan = [
    new Tabungan("Siswa 1", 100000),
    new Tabungan("Siswa 2", 150000),
    new Tabungan("Siswa 3", 200000),
];

echo "=== Program Tabungan Sekolah ===\n";

while (true) {
    echo "\nMenu:\n";
    echo "1. Tampilkan Saldo\n";
    echo "2. Setor Tunai\n";
    echo "3. Tarik Tunai\n";
    echo "4. Keluar\n";

    $pilihan = bacaPilihanMenu();

    if ($pilihan == '4') {
        break;
    }

    switch ($pilihan) {
        case '1':
            echo "Daftar saldo siswa:\n";
            foreach ($tabungan as $obj) {
                $obj->tampilkanSaldo();
            }
            break;

        case '2':
            $id = bacaIdSiswa(count($tabungan), $tabungan);
            $jumlahSetor = bacaJumlah(">> Masukkan jumlah setor: Rp");
            $tabungan[$id]->setorTunai($jumlahSetor);
            break;

        case '3':
            $id = bacaIdSiswa(count($tabungan), $tabungan);
            $jumlahTarik = bacaJumlah(">> Masukkan jumlah tarik: Rp");
            $tabungan[$id]->tarikTunai($jumlahTarik);
            break;
    }
}

// Tampilkan rekap saldo akhir di terminal
echo "\n------------------------------\n";
echo "=== Rekap Saldo Akhir Siswa ===\n";
foreach ($tabungan as $emp) {
    echo $emp->getNama() . ": Rp" . number_format($emp->getSaldo(), 0, ',', '.') . "\n";
}
echo "------------------------------\n";
