<?php
// Fungsi untuk menentukan jumlah hari dalam sebulan berdasarkan bulan dan tahun
function jumlahHari($bulan, $tahun = null) {
    switch ($bulan) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            return 31;
        case 4: case 6: case 9: case 11:
            return 30;
        case 2:
            if ($tahun) {
                if (($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0)) {
                    return 29; // Tahun kabisat
                } else {
                    return 28; // Tahun bukan kabisat
                }
            }
            return null; // Tahun tidak ditentukan
        default:
            return null; // Bulan tidak valid
    }
}

// Menangani input dari pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bulan = intval($_POST["bulan"]);
    $tahun = isset($_POST["tahun"]) ? intval($_POST["tahun"]) : null;
    $jumlahHari = jumlahHari($bulan, $tahun);
    $namaBulan = '';

    // Menentukan nama bulan berdasarkan nomor bulan
    switch ($bulan) {
        case 1: $namaBulan = "Januari"; break;
        case 2: $namaBulan = "Februari"; break;
        case 3: $namaBulan = "Maret"; break;
        case 4: $namaBulan = "April"; break;
        case 5: $namaBulan = "Mei"; break;
        case 6: $namaBulan = "Juni"; break;
        case 7: $namaBulan = "Juli"; break;
        case 8: $namaBulan = "Agustus"; break;
        case 9: $namaBulan = "September"; break;
        case 10: $namaBulan = "Oktober"; break;
        case 11: $namaBulan = "November"; break;
        case 12: $namaBulan = "Desember"; break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Hari dalam Sebulan</title>
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
        .form-group select, .form-group input {
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
        <h2>Jumlah Hari dalam Sebulan</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="bulan">Pilih Bulan (1-12):</label>
                <select id="bulan" name="bulan">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Masukkan Tahun (opsional):</label>
                <input type="number" id="tahun" name="tahun" min="1900" max="2100">
            </div>
            <button type="submit">Tentukan Jumlah Hari</button>
        </form>

        <?php if (isset($jumlahHari)): ?>
            <div class="result">
                <h3>Hasil Penentuan Hari</h3>
                <?php if ($jumlahHari === null): ?>
                    <p class="error">Error: Bulan tidak valid atau tahun tidak valid.</p>
                <?php else: ?>
                    <p><strong>Bulan:</strong> <?php echo $namaBulan; ?></p>
                    <p><strong>Jumlah Hari:</strong> <?php echo $jumlahHari; ?> hari</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
