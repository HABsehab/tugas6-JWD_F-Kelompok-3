<?php
// Fungsi untuk menghitung nilai akhir berdasarkan komponen nilai
function hitung_nilai_akhir($nilai_kehadiran, $nilai_tugas, $nilai_uts, $nilai_uas) {
    $nilai_akhir = (0.10 * $nilai_kehadiran) + (0.20 * $nilai_tugas) + (0.30 * $nilai_uts) + (0.40 * $nilai_uas);
    return $nilai_akhir;
}

// Fungsi untuk menentukan kelulusan berdasarkan nilai akhir
function tentukan_kelulusan($nilai_akhir) {
    if ($nilai_akhir >= 85) {
        return "Lulus dengan Predikat A";
    } elseif ($nilai_akhir >= 75) {
        return "Lulus dengan Predikat B";
    } elseif ($nilai_akhir >= 65) {
        return "Lulus dengan Predikat C";
    } else {
        return "Remedial";
    }
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai_kehadiran = floatval($_POST["nilai_kehadiran"]);
    $nilai_tugas = floatval($_POST["nilai_tugas"]);
    $nilai_uts = floatval($_POST["nilai_uts"]);
    $nilai_uas = floatval($_POST["nilai_uas"]);

    $nilai_akhir = hitung_nilai_akhir($nilai_kehadiran, $nilai_tugas, $nilai_uts, $nilai_uas);
    $hasil_kelulusan = tentukan_kelulusan($nilai_akhir);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penentuan Kelulusan Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 500px;
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
        <h2>Penentuan Kelulusan Ujian</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nilai_kehadiran">Nilai Kehadiran:</label>
                <input type="number" id="nilai_kehadiran" name="nilai_kehadiran" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="nilai_tugas">Nilai Tugas:</label>
                <input type="number" id="nilai_tugas" name="nilai_tugas" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="nilai_uts">Nilai UTS:</label>
                <input type="number" id="nilai_uts" name="nilai_uts" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="nilai_uas">Nilai UAS:</label>
                <input type="number" id="nilai_uas" name="nilai_uas" step="0.1" required>
            </div>
            <button type="submit">Cek Kelulusan</button>
        </form>

        <?php if (isset($nilai_akhir)): ?>
            <div class="result">
                <h3>Hasil Kelulusan</h3>
                <p><strong>Nilai Akhir:</strong> <?php echo number_format($nilai_akhir, 2); ?></p>
                <p><?php echo $hasil_kelulusan; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
