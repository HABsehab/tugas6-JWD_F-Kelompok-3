<?php
// Fungsi untuk menentukan kategori umur berdasarkan usia
function tentukan_kategori_umur($usia) {
    if ($usia < 17) {
        return "Anak-anak";
    } elseif ($usia >= 17 && $usia <= 30) {
        return "Remaja";
    } elseif ($usia >= 31 && $usia <= 59) {
        return "Dewasa";
    } else {
        return "Lansia";
    }
}

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usia = intval($_POST["usia"]);
    $kategori_umur = tentukan_kategori_umur($usia);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penentuan Kategori Umur</title>
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
        <h2>Penentuan Kategori Umur</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="usia">Masukkan Usia:</label>
                <input type="number" id="usia" name="usia" required>
            </div>
            <button type="submit">Cek Kategori</button>
        </form>

        <?php if (isset($kategori_umur)): ?>
            <div class="result">
                <h3>Hasil Penentuan Kategori Umur</h3>
                <p><strong>Kategori Umur:</strong> <?php echo $kategori_umur; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
