<?php

function hitungDiskon($harga, $persen)
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".");

function tentukanKelulusan($nilai)
{
    if ($nilai >= 75) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

$nilaiMahasiswa = 80;
$statusKelulusan = tentukanKelulusan($nilaiMahasiswa);

echo "<br>Nilai mahasiswa: " . $nilaiMahasiswa;
echo "<br>Status kelulusan: " . $statusKelulusan;