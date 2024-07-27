<?php
// Fungsi untuk menentukan kelulusan berdasarkan nilai
function tentukan_kelulusan($nilai) {
    if ($nilai >= 80) {
        return "Lulus dengan Predikat A";
    } elseif ($nilai >= 70) {
        return "Lulus dengan Predikat B";
    } elseif ($nilai >= 60) {
        return "Lulus dengan Predikat C";
    } else {
        return "Tidak Lulus";
    }
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = floatval($_POST["nilai"]);
    $hasil_kelulusan = tentukan_kelulusan($nilai);
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
        <h2>Penentuan Kelulusan Ujian</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nilai">Masukkan Nilai:</label>
                <input type="number" id="nilai" name="nilai" step="0.1" required>
            </div>
            <button type="submit">Cek Kelulusan</button>
        </form>

        <?php if (isset($hasil_kelulusan)): ?>
            <div class="result">
                <h3>Hasil Kelulusan</h3>
                <p><?php echo $hasil_kelulusan; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
