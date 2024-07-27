<?php
// Fungsi untuk memeriksa apakah sebuah bilangan adalah bilangan prima
function apakahPrima($num) {
    if ($num <= 1) {
        return false; // 0 dan 1 bukan bilangan prima
    }
    if ($num == 2) {
        return true; // 2 adalah bilangan prima
    }
    if ($num % 2 == 0) {
        return false; // Bilangan genap selain 2 bukan bilangan prima
    }
    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) {
            return false; // Jika habis dibagi selain 1 dan bilangan itu sendiri
        }
    }
    return true; // Jika tidak ada pembagi selain 1 dan bilangan itu sendiri
}

// Meminta input dari pengguna untuk rentang bilangan
echo "Masukkan awal rentang: ";
$awal = intval(trim(fgets(STDIN)));

echo "Masukkan akhir rentang: ";
$akhir = intval(trim(fgets(STDIN)));

// Mencari dan menampilkan bilangan prima dalam rentang
echo "Bilangan prima dari $awal hingga $akhir adalah:\n";
for ($num = $awal; $num <= $akhir; $num++) {
    if (apakahPrima($num)) {
        echo $num . " ";
    }
}
echo "\n";
?>
