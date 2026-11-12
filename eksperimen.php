<?php
function e($t) { return htmlspecialchars((string)$t, ENT_QUOTES, "UTF-8"); }

// Eksperimen 3: function format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// Eksperimen 1: rata-rata tiga nilai
$hasilRata = null;
$errRata = "";
if (($_POST["aksi"] ?? "") === "rata") {
    $n1 = $_POST["n1"] ?? "";
    $n2 = $_POST["n2"] ?? "";
    $n3 = $_POST["n3"] ?? "";
    if (is_numeric($n1) && is_numeric($n2) && is_numeric($n3)) {
        $hasilRata = ((float)$n1 + (float)$n2 + (float)$n3) / 3;
    } else {
        $errRata = "Semua nilai harus berupa angka.";
    }
}

// Eksperimen 2: cari nama dari array dengan GET
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eko", "Fitri", "Gilang", "Bimo"];
$cari = trim($_GET["cari"] ?? "");
$ditemukan = [];
if ($cari !== "") {
    foreach ($daftarNama as $n) {
        if (stripos($n, $cari) !== false) {
            $ditemukan[] = $n;
        }
    }
}

// Eksperimen 4: validasi NIM (hanya angka, tepat 10 digit)
$pesanNim = "";
$nimValue = "";
if (($_POST["aksi"] ?? "") === "nim") {
    $nimValue = trim($_POST["nim"] ?? "");
    if (!ctype_digit($nimValue)) {
        $pesanNim = "NIM tidak valid: hanya boleh berisi angka.";
    } elseif (strlen($nimValue) !== 10) {
        $pesanNim = "NIM tidak valid: panjang harus tepat 10 digit.";
    } else {
        $pesanNim = "NIM valid: " . e($nimValue);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen Mandiri</title>
<style>body{font-family:Arial,sans-serif;max-width:620px;margin:30px auto;padding:0 12px}
fieldset{margin-bottom:20px}</style></head>
<body>
<h1>Eksperimen Mandiri</h1>

<fieldset>
 <legend>1. Rata-rata tiga nilai</legend>
 <form method="POST">
  <input type="hidden" name="aksi" value="rata">
  <input name="n1" placeholder="Nilai 1" value="<?= e($_POST['n1'] ?? '') ?>">
  <input name="n2" placeholder="Nilai 2" value="<?= e($_POST['n2'] ?? '') ?>">
  <input name="n3" placeholder="Nilai 3" value="<?= e($_POST['n3'] ?? '') ?>">
  <button type="submit">Hitung</button>
 </form>
 <?php if ($hasilRata !== null) echo "<p>Rata-rata: " . number_format($hasilRata, 2) . "</p>"; ?>
 <?php if ($errRata) echo "<p style='color:red'>" . e($errRata) . "</p>"; ?>
</fieldset>

<fieldset>
 <legend>2. Cari nama (GET)</legend>
 <form method="GET">
  <input name="cari" placeholder="Ketik nama" value="<?= e($cari) ?>">
  <button type="submit">Cari</button>
 </form>
 <?php
 if ($cari !== "") {
     if ($ditemukan) {
         echo "<p>Ditemukan: " . e(implode(", ", $ditemukan)) . "</p>";
     } else {
         echo "<p>Nama tidak ditemukan.</p>";
     }
 }
 ?>
 <small>Data yang dicari: <?= e(implode(", ", $daftarNama)) ?></small>
</fieldset>

<fieldset>
 <legend>3. Format Rupiah (function)</legend>
 <p>formatRupiah(1500000) = <?= formatRupiah(1500000) ?></p>
 <p>formatRupiah(25000) = <?= formatRupiah(25000) ?></p>
</fieldset>

<fieldset>
 <legend>4. Validasi NIM (angka, 10 digit)</legend>
 <form method="POST">
  <input type="hidden" name="aksi" value="nim">
  <input name="nim" placeholder="Masukkan NIM" value="<?= e($nimValue) ?>">
  <button type="submit">Cek</button>
 </form>
 <?php if ($pesanNim) echo "<p>" . $pesanNim . "</p>"; ?>
</fieldset>

<fieldset>
 <legend>5. Tombol Reset</legend>
 <form method="POST" action="">
  <input name="teks" placeholder="Ketik sesuatu" value="<?= e($_POST['teks'] ?? '') ?>">
  <button type="submit">Kirim</button>
  <button type="reset">Reset</button>
 </form>
 <p><small>Reset hanya mengosongkan isian di browser (tanpa kontak ke server).
 Kalau halaman habis dikirim, isian terisi dari PHP, tombol Reset akan mengembalikannya ke nilai awal
 form (yaitu nilai yang diisi PHP), bukan mengosongkannya. Memproses ulang di server
 berarti browser mengirim ulang form ke PHP.</small></p>
</fieldset>

<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
