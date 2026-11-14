<?php
session_start();

// Mengambil pesan kesalahan dan data sebelumnya.
$error = $_SESSION["error"] ?? [];
$old = $_SESSION["old"] ?? [];

// Menghapus pesan sementara dari session.
unset($_SESSION["error"], $_SESSION["old"]);

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
    <title>Formulir Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>Formulir Data Mahasiswa</h1>
            <p>Silakan lengkapi formulir berikut dengan data yang benar.</p>
        </div>

        <div class="card">
            <h2>Data Mahasiswa</h2>

            <!-- Menampilkan seluruh pesan kesalahan -->
            <?php if (!empty($error)): ?>
                <div class="error-box">
                    <h3>Terjadi Kesalahan!</h3>
                    <ul>
                        <?php foreach ($error as $pesan): ?>
                            <li><?= e($pesan); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Formulir mengirim data ke proses.php menggunakan POST -->
            <form action="proses.php" method="POST">

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        value="<?= e($old["nama"] ?? ""); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input
                        type="text"
                        id="nim"
                        name="nim"
                        placeholder="Masukkan NIM"
                        value="<?= e($old["nim"] ?? ""); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <input
                        type="text"
                        id="prodi"
                        name="prodi"
                        placeholder="Masukkan program studi"
                        value="<?= e($old["prodi"] ?? ""); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input
                        type="number"
                        id="semester"
                        name="semester"
                        placeholder="Masukkan semester (1–14)"
                        min="1"
                        max="14"
                        step="1"
                        value="<?= e($old["semester"] ?? ""); ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="contoh@email.com"
                        value="<?= e($old["email"] ?? ""); ?>"
                        required>
                </div>

                <button type="submit">Kirim Data Mahasiswa</button>

            </form>
        </div>

        <div class="footer">
            Praktikum 7 - Pemrograman Server-Side dengan PHP
        </div>

    </div>

</body>

</html>