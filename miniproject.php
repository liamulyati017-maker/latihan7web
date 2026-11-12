<?php
// ===== BAGIAN 1: PEMROSESAN DATA (logika) =====
$data = null;
$error = [];
$nama = $nim = $prodi = $email = "";
$semesterInput = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($nama === "") $error[] = "Nama wajib diisi.";
    if ($nim === "") $error[] = "NIM wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

// Fungsi bantu supaya menulis htmlspecialchars tidak berulang
function e($teks) {
    return htmlspecialchars((string)$teks, ENT_QUOTES, "UTF-8");
}
?>
<!-- ===== BAGIAN 2: TAMPILAN HTML ===== -->
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Formulir Data Mahasiswa</title>
 <style>
  body { font-family: Arial, sans-serif; max-width: 520px; margin: 30px auto; padding: 0 12px; }
  label { display: block; margin-top: 10px; font-weight: bold; }
  input { width: 100%; padding: 8px; box-sizing: border-box; }
  button { margin-top: 15px; padding: 10px 18px; }
  .error { background: #ffe5e5; border: 1px solid #d33; padding: 10px; margin-top: 15px; }
  .sukses { background: #e6ffe9; border: 1px solid #2a2; padding: 10px; margin-top: 15px; }
 </style>
</head>
<body>
<h1>Formulir Data Mahasiswa</h1>

<form method="POST" action="">
 <label for="nama">Nama</label>
 <input id="nama" name="nama" type="text" value="<?= e($nama) ?>">

 <label for="nim">NIM</label>
 <input id="nim" name="nim" type="text" value="<?= e($nim) ?>">

 <label for="prodi">Program Studi</label>
 <input id="prodi" name="prodi" type="text" value="<?= e($prodi) ?>">

 <label for="semester">Semester (1–14)</label>
 <input id="semester" name="semester" type="number" min="1" max="14" value="<?= e($semesterInput) ?>">

 <label for="email">Email</label>
 <input id="email" name="email" type="text" value="<?= e($email) ?>">

 <button type="submit">Kirim</button>
</form>

<?php if ($error): ?>
 <div class="error">
  <strong>Ada kesalahan:</strong>
  <ul>
   <?php foreach ($error as $pesan): ?>
    <li><?= e($pesan) ?></li>
   <?php endforeach; ?>
  </ul>
 </div>
<?php elseif ($data): ?>
 <div class="sukses">
  <h3>Ringkasan Data Mahasiswa</h3>
  <p>Nama: <?= e($data["nama"]) ?></p>
  <p>NIM: <?= e($data["nim"]) ?></p>
  <p>Program Studi: <?= e($data["prodi"]) ?></p>
  <p>Semester: <?= e($data["semester"]) ?></p>
  <p>Email: <?= e($data["email"]) ?></p>
 </div>
<?php endif; ?>

<p><a href="index.php">&larr; Kembali ke menu</a></p>
</body>
</html>
