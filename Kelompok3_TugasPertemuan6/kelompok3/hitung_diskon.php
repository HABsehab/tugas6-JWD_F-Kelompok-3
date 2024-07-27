<?php
function hitung_diskon($total_belanja) {
    if ($total_belanja >= 100000) {
        return 0.10;  // Diskon 10%
    } elseif ($total_belanja >= 50000) {
        return 0.05;  // Diskon 5%
    } else {
        return 0.0;   // Tidak ada diskon
    }
}

function hitung_total_setelah_diskon($jumlah_barang, $harga_per_barang) {
    $total_belanja = $jumlah_barang * $harga_per_barang;
    $diskon = hitung_diskon($total_belanja);
    $jumlah_diskon = $total_belanja * $diskon;
    $total_setelah_diskon = $total_belanja - $jumlah_diskon;
    return array($total_belanja, $jumlah_diskon, $total_setelah_diskon);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_barang = intval($_POST["jumlah_barang"]);
    $harga_per_barang = floatval($_POST["harga_per_barang"]);

    list($total_belanja, $jumlah_diskon, $total_setelah_diskon) = hitung_total_setelah_diskon($jumlah_barang, $harga_per_barang);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Diskon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .result {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hitung Diskon</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang:</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" required>
            </div>
            <div class="form-group">
                <label for="harga_per_barang">Harga Per Barang (Rp):</label>
                <input type="number" id="harga_per_barang" name="harga_per_barang" step="0.01" required>
            </div>
            <button type="submit">Hitung</button>
        </form>

        <?php if (isset($total_belanja)): ?>
            <div class="result">
                <h3>Hasil Perhitungan</h3>
                <p><strong>Total Belanja:</strong> Rp. <?php echo number_format($total_belanja, 2, ',', '.'); ?></p>
                <p><strong>Diskon:</strong> Rp. <?php echo number_format($jumlah_diskon, 2, ',', '.'); ?></p>
                <p><strong>Total Setelah Diskon:</strong> Rp. <?php echo number_format($total_setelah_diskon, 2, ',', '.'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
