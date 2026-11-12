<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 3</title></head>
<body>
<h1>Latihan 3 - Perulangan dan Array</h1>
<?php
// 4 nama dari modul + 3 nama tambahan (tugas: tambah minimal tiga nama)
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eko", "Fitri", "Gilang"];

echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
?>
<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
