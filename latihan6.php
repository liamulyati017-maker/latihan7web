<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 6</title></head>
<body>
<h1>Latihan 6 - Form dengan POST</h1>
<form method="POST" action="">
 <p><label for="nama">Nama:</label>
 <input id="nama" name="nama" type="text" required></p>
 <p><label for="prodi">Program Studi:</label>
 <input id="prodi" name="prodi" type="text" required></p>
 <button type="submit" name="kirim">Kirim Data</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    if ($nama === "" || $prodi === "") {
        echo "<p>Semua kolom wajib diisi.</p>";
    } else {
        echo "<h3>Data diterima</h3>";
        echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
        echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
    }
}
?>
<p><small>Coba kirim: data lengkap, input kosong (hapus atribut required lewat Inspect
untuk menguji server), dan tulisan seperti <code>&lt;b&gt;Halo&lt;/b&gt;</code> atau tanda kutip.</small></p>
<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
