<?php
// Contoh array bilangan
$bilangan = array(10, 20, 30, 40, 50);

// Contoh array kata
$kata = array("Merah", "Kuning", "Hijau", "Biru", "Ungu");

// Contoh array data campuran
$data = array(1, "Belajar", 3.14, true);

echo "Elemen-elemen array bilangan:\n";
foreach ($bilangan as $nilai) {
    echo $nilai . "\n";
}

echo "\nElemen-elemen array kata:\n";
foreach ($kata as $warna) {
    echo $warna . "\n";
}

echo "\nElemen-elemen array data:\n";
foreach ($data as $item) {
    echo $item . "\n";
}