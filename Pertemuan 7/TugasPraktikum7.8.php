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

// Fungsi untuk baca input dari CLI dengan validasi angka positif
function bacaInput($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

// Fungsi untuk membaca pilihan menu valid (1-4)
function bacaPilihanMenu() {
    do {
        $input = bacaInput("Pilih menu (1-4): ");
        if (in_array($input, ['1','2','3','4'])) {
            return $input;
        } else {
            echo "Pilihan tidak valid. Silakan coba lagi.\n";
        }
    } while (true);
}

// Fungsi untuk baca ID employee valid (1-3)
function bacaIdEmployee($max, $tabungan) {
    do {
        echo "Daftar Siswa:\n";
        foreach ($tabungan as $index => $obj) {
            echo ($index + 1) . ". " . $obj->getNama() . " (Saldo: Rp" . number_format($obj->getSaldo(), 0, ',', '.') . ")\n";
        }
        $input = bacaInput("Pilih siswa (1-$max): ");
        if (ctype_digit($input)) {
            $num = intval($input);
            if ($num >= 1 && $num <= $max) {
                return $num - 1; // array index mulai 0
            }
        }
        echo "Input tidak valid. Silakan masukkan angka antara 1 sampai $max.\n";
    } while (true);
}

// Fungsi untuk baca jumlah uang (positif)
function bacaJumlah($prompt) {
    do {
        $input = bacaInput($prompt);
        if (ctype_digit($input) && intval($input) > 0) {
            return intval($input);
        }
        echo "Jumlah harus berupa angka positif.\n";
    } while (true);
}

// Program utama
$tabungan = [
    new Tabungan("Siswa 1", 100000),
    new Tabungan("Siswa 2", 150000),
    new Tabungan("Siswa 3", 200000),
];

echo "=== Program Tabungan Sekolah ===\n";

do {
    echo "\nMenu:\n";
    echo "1. Tampilkan Saldo\n";
    echo "2. Setor Tunai\n";
    echo "3. Tarik Tunai\n";
    echo "4. Keluar\n";

    $pilihan = bacaPilihanMenu();

    if ($pilihan == '4') {
        break; // keluar loop
    }

    switch ($pilihan) {
        case '1':
            // Tampilkan saldo semua siswa sekaligus
            echo "Daftar saldo siswa:\n";
            foreach ($tabungan as $obj) {
                $obj->tampilkanSaldo();
            }
            break;

        case '2':
            // Pilih siswa dulu baru setor
            $id = bacaIdEmployee(count($tabungan), $tabungan);
            $jumlahSetor = bacaJumlah("Masukkan jumlah setor: Rp");
            $tabungan[$id]->setorTunai($jumlahSetor);
            break;

        case '3':
            // Pilih siswa dulu baru tarik
            $id = bacaIdEmployee(count($tabungan), $tabungan);
            $jumlahTarik = bacaJumlah("Masukkan jumlah tarik: Rp");
            $tabungan[$id]->tarikTunai($jumlahTarik);
            break;
    }

} while (true);

// Simpan saldo ke file output_tabungan.txt
$filename = "output_tabungan.txt";
$file = fopen($filename, "w");
if ($file) {
    fwrite($file, "=== Rekap Saldo Akhir Employee ===\n");
    foreach ($tabungan as $emp) {
        fwrite($file, $emp->getNama() . ": Rp" . number_format($emp->getSaldo(), 0, ',', '.') . "\n");
    }
    fclose($file);
    echo ">> Saldo akhir berhasil disimpan di file '$filename'.\n";
} else {
    echo ">> Gagal membuka file untuk menulis.\n";
}

?>