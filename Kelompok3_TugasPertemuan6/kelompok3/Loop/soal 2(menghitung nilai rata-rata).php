<style>
    body,html {
        font-size: 25px;
        line-height: 3px;
        margin: 0px;
        padding-left: 10px;
        background-color: #000;
        color: #fff;
    }
</style>
<?php
// Deklarasi array untuk menyimpan nilai-nilai
$nilai = array();

// Input nilai dari pengguna menggunakan do-while
$i = 0;
do {
    echo "Masukkan nilai untuk siswa ".($i+1).": ";
    $nilai[$i] = trim(fgets(STDIN));
    $i++;
} while ($i < 5);

// Menghitung total nilai menggunakan looping for
$total = 0;
for ($j = 0; $j < 5; $j++) {
    $total += $nilai[$j];
}

// Menghitung rata-rata
$rataRata = $total / 5;

// Menampilkan hasil
echo "Total nilai: $total\n";
echo "Rata-rata nilai: $rataRata\n";
?>

