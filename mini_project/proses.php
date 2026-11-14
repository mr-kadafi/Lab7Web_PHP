
<?php
session_start();

// Menyiapkan variabel data dan pesan kesalahan.
$data = null;
$error = [];

// Memastikan data dikirim menggunakan metode POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Mengambil data dari formulir.
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    // Menyimpan input untuk ditampilkan kembali jika terjadi error.
    $_SESSION["old"] = [
        "nama" => $nama,
        "nim" => $nim,
        "prodi" => $prodi,
        "semester" => $semesterInput,
        "email" => $email
    ];

    // Validasi kolom wajib diisi.
    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }

    if ($email === "") {
        $error[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    // Validasi semester berupa bilangan bulat 1–14.
    if (
        !ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 ||
        (int)$semesterInput > 14
    ) {
        $error[] = "Semester harus berupa bilangan bulat 1–14.";
    }

    // Jika terdapat kesalahan, kembali ke halaman formulir.
    if (!empty($error)) {
        $_SESSION["error"] = $error;

        header("Location: index.php");
        exit;
    }

    // Jika seluruh data valid, simpan data ke session.
    $data = compact("nama", "nim", "prodi", "email");
    $data["semester"] = (int)$semesterInput;

    $_SESSION["data_mahasiswa"] = $data;

    // Mengarahkan pengguna ke halaman hasil.
    unset($_SESSION["old"]);

    header("Location: hasil.php");
    exit;
} else {
    // Jika halaman diakses tanpa mengirim POST.
    header("Location: index.php");
    exit;
}