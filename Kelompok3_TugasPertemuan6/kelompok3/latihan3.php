<?php
// Fungsi untuk menghitung tarif taksi berdasarkan jarak tempuh
function hitung_tarif_taksi($jarak) {
    $tarif_awal = 5000;
    $tarif_per_km = ($jarak <= 1) ? 3000 : 2000;
    $total_tarif = $tarif_awal + ($jarak - 1) * $tarif_per_km;
    if ($jarak <= 1) {
        $total_tarif = $tarif_awal;
    }
    return $total_tarif;
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jarak = floatval($_POST["jarak"]);
    $total_tarif = hitung_tarif_taksi($jarak);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Tarif Taksi</title>
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
        .result p {
            margin: 10px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Perhitungan Tarif Taksi</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="jarak">Masukkan Jarak Tempuh (km):</label>
                <input type="number" id="jarak" name="jarak" step="0.1" required>
            </div>
            <button type="submit">Hitung Tarif</button>
        </form>

        <?php if (isset($total_tarif)): ?>
            <div class="result">
                <h3>Hasil Perhitungan</h3>
                <p><strong>Total Tarif:</strong> Rp. <?php echo number_format($total_tarif, 0, ',', '.'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

