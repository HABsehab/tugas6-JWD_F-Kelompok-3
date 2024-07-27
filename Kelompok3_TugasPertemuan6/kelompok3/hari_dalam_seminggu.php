<?php
// Fungsi untuk menentukan nama hari berdasarkan nomor hari
function tentukanHari($nomorHari) {
    switch ($nomorHari) {
        case 1:
            return "Senin";
        case 2:
            return "Selasa";
        case 3:
            return "Rabu";
        case 4:
            return "Kamis";
        case 5:
            return "Jumat";
        case 6:
            return "Sabtu";
        case 7:
            return "Minggu";
        default:
            return "Error: Nomor hari tidak valid. Masukkan nomor antara 1 dan 7.";
    }
}

// Menangani input dari pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomorHari = intval($_POST["hari"]);
    $namaHari = tentukanHari($nomorHari);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penentuan Hari dalam Seminggu</title>
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
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Penentuan Hari dalam Seminggu</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="hari">Masukkan Nomor Hari (1-7):</label>
                <input type="number" id="hari" name="hari" min="1" max="7" required>
            </div>
            <button type="submit">Tentukan Hari</button>
        </form>

        <?php if (isset($namaHari)): ?>
            <div class="result">
                <h3>Hasil Penentuan Hari</h3>
                <?php if (strpos($namaHari, "Error") !== false): ?>
                    <p class="error"><?php echo $namaHari; ?></p>
                <?php else: ?>
                    <p><strong>Hari:</strong> <?php echo $namaHari; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
