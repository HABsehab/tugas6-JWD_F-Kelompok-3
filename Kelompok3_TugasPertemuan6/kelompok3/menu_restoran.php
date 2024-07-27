<?php
// Menangani input dari pelanggan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pilihan = intval($_POST["menu"]);

    // Menentukan menu berdasarkan pilihan menggunakan switch
    switch ($pilihan) {
        case 1:
            $namaMenu = "Nasi Goreng";
            $harga = 15000;
            break;
        case 2:
            $namaMenu = "Mie Goreng";
            $harga = 12000;
            break;
        case 3:
            $namaMenu = "Ayam Bakar";
            $harga = 20000;
            break;
        case 4:
            $namaMenu = "Ikan Bakar";
            $harga = 18000;
            break;
        default:
            $namaMenu = "Menu tidak tersedia";
            $harga = 0;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Restoran</title>
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
        .form-group select {
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
        <h2>Menu Restoran</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="menu">Pilih Menu:</label>
                <select id="menu" name="menu">
                    <option value="1">Nasi Goreng (Rp. 15.000)</option>
                    <option value="2">Mie Goreng (Rp. 12.000)</option>
                    <option value="3">Ayam Bakar (Rp. 20.000)</option>
                    <option value="4">Ikan Bakar (Rp. 18.000)</option>
                </select>
            </div>
            <button type="submit">Tampilkan Menu</button>
        </form>

        <?php if (isset($namaMenu)): ?>
            <div class="result">
                <h3>Detail Menu</h3>
                <p><strong>Menu:</strong> <?php echo $namaMenu; ?></p>
                <p><strong>Harga:</strong> Rp. <?php echo number_format($harga, 0, ',', '.'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
