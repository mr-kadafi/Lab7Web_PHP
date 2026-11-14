<?php
session_start();

// Mengambil data mahasiswa dari session.
$data = $_SESSION["data_mahasiswa"] ?? null;

// Jika tidak ada data, kembali ke formulir.
if ($data === null) {
    header("Location: index.php");
    exit;
}

// Fungsi untuk mengamankan output.
function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>Ringkasan Data Mahasiswa</h1>
            <p>Data mahasiswa berhasil dikirim dan divalidasi.</p>
        </div>

        <div class="card">

            <h2>Informasi Mahasiswa</h2>

            <div class="success-box">
                Data mahasiswa berhasil disimpan sementara.
            </div>

            <table class="result-table">
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?= e($data["nama"]); ?></td>
                </tr>

                <tr>
                    <td>NIM</td>
                    <td><?= e($data["nim"]); ?></td>
                </tr>

                <tr>
                    <td>Program Studi</td>
                    <td><?= e($data["prodi"]); ?></td>
                </tr>

                <tr>
                    <td>Semester</td>
                    <td><?= e($data["semester"]); ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?= e($data["email"]); ?></td>
                </tr>
            </table>

            <a href="index.php" class="btn">Kembali ke Formulir</a>

        </div>

        <div class="footer">
            Praktikum 7 - Pemrograman Server-Side dengan PHP
        </div>

    </div>

</body>

</html>