<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 5</title></head>
<body>
<h1>Latihan 5 - Form dengan GET</h1>
<form method="GET" action="">
 <label for="kata">Kata kunci:</label>
 <input id="kata" name="kata" type="text">
 <button type="submit">Cari</button>
</form>
<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
    echo "<p><small>Lihat alamat URL di atas: ada tulisan ?kata=... Itu data GET. "
       . "Jangan kirim kata sandi lewat GET!</small></p>";
}
?>
<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
