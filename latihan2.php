<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 2</title></head>
<body>
<h1>Latihan 2 - Variabel, Operator, Percabangan</h1>
<?php
// Fungsi kecil supaya kita bisa uji banyak kombinasi nilai sekaligus
function tentukanPredikat($nilai) {
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 75) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    } else {
        return "D";
    }
}

// Contoh dari modul (Siti)
$nama = "Siti";
$tugas = 85;
$uts = 78;
$uas = 90;
$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
$predikat = tentukanPredikat($nilaiAkhir);

echo "<h3>Contoh dari modul</h3>";
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . $predikat;

// Uji beberapa kombinasi nilai (sesuai perintah: ubah tugas, UTS, UAS)
$uji = [
    ["Budi", 100, 100, 100],
    ["Cindy", 80, 70, 75],
    ["Dedi", 60, 60, 60],
    ["Eka", 40, 50, 30],
];

echo "<h3>Uji beberapa kombinasi</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>";
foreach ($uji as $baris) {
    [$n, $t, $u, $a] = $baris;
    $akhir = ($t * 0.30) + ($u * 0.30) + ($a * 0.40);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($n) . "</td><td>$t</td><td>$u</td><td>$a</td>";
    echo "<td>" . number_format($akhir, 2) . "</td><td>" . tentukanPredikat($akhir) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
