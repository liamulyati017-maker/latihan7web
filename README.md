# Lab7Web_PHP – Praktikum 7: Pemrograman Server-Side dengan PHP

## 1. Tujuan
- Mengerti beda proses di browser (client-side) dan di server (server-side).
- Menjalankan file PHP lewat server lokal.
- Memakai variabel, operator, percabangan, perulangan, dan function.
- Menerima data form dengan GET dan POST.
- Memeriksa (validasi) dan membersihkan (sanitasi) input.
- Membuat aplikasi kecil: form data mahasiswa.

## 2. Perangkat
Laptop/PC, web browser, Visual Studio Code, PHP, dan XAMPP (atau Laragon).

## 3. Cara Menjalankan Server Lokal
1. Pasang XAMPP, lalu buka **XAMPP Control Panel**.
2. Klik **Start** di baris **Apache**.
3. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\`.
4. Buka browser, ketik: `http://localhost/Lab7Web_PHP/`
5. **Jangan** klik dua kali file `.php` (kodenya tidak akan dijalankan).

(Alternatif tanpa XAMPP: buka terminal di folder ini, lalu ketik `php -S localhost:8000`
dan buka `http://localhost:8000/`.)

## 4. Struktur File
```
Lab7Web_PHP/
├── index.php          (menu semua latihan)
├── latihan1.php       (menjalankan PHP)
├── latihan2.php       (variabel, operator, if)
├── latihan3.php       (foreach & array)
├── latihan4.php       (function)
├── latihan5.php       (form GET)
├── latihan6.php       (form POST)
├── latihan7.php       (hitung subtotal)
├── miniproject.php    (form data mahasiswa)
├── eksperimen.php     (eksperimen mandiri 1-5)
├── README.md
└── screenshot/        (taruh screenshot kamu di sini)
```

## 5. Penjelasan Pelan-pelan (Bahasa Bayi)

### Latihan 1 – Menjalankan PHP
- PHP itu seperti **juru masak di dapur** (server). Browser itu **pembeli**.
- Pembeli minta makanan, juru masak masak, lalu pembeli cuma terima **makanan jadi** (HTML).
- Pembeli tidak pernah melihat resepnya (kode PHP). Makanya kode PHP tidak muncul di browser.
- `echo` artinya "tulis ini ke layar". `date(...)` artinya "ambil jam sekarang".

### Latihan 2 – Variabel, operator, percabangan
- **Variabel** = kotak bernama untuk menyimpan sesuatu. Nama kotak selalu diawali `$`. Contoh `$nama = "Siti";`
- **Operator** = tanda hitung: `*` kali, `+` tambah.
- Nilai akhir = tugas 30% + UTS 30% + UAS 40%.
- **if / elseif / else** = "kalau ... maka ...". Kalau nilai ≥ 85 dapat A, kalau tidak lalu kalau ≥ 75 dapat B, dan seterusnya.
- Aku tambah tabel supaya kamu bisa lihat banyak kombinasi nilai sekaligus.

### Latihan 3 – Perulangan dan array
- **Array** = rak dengan banyak laci, isinya daftar. `["Alya","Bima"]`
- **foreach** = "ambil isi laci satu-satu dari awal sampai habis".
- Aku tambah tiga nama: Eko, Fitri, Gilang.

### Latihan 4 – Function
- **Function** = mesin kecil. Masukkan bahan (parameter), keluar hasil (`return`).
- `hitungDiskon(150000, 10)` → harga dipotong 10%.
- Aku tambah mesin baru: `hitungLuasPersegiPanjang` dan `tentukanKelulusan`.
- Manfaat function: bisa dipakai berkali-kali tanpa menulis ulang.

### Latihan 5 – Form GET
- GET = menulis pesan di **kartu pos**: isinya kelihatan di alamat URL (`?kata=...`).
- Cocok untuk pencarian. **Jangan** untuk kata sandi.
- `isset($_GET["kata"])` = "apakah ada kiriman bernama kata?"
- `trim()` = buang spasi di pinggir.

### Latihan 6 – Form POST
- POST = pesan di dalam **amplop tertutup**: tidak muncul di URL.
- Tapi amplop belum tentu aman. Untuk aman, pakai HTTPS (POST bukan enkripsi).
- `$_POST["nama"] ?? ""` artinya "ambil nama, kalau tidak ada pakai kosong".
- `htmlspecialchars()` = mengubah `<` jadi teks biasa, jadi tag jahat tidak dijalankan browser.

### Latihan 7 – Pengolahan data
- Cek dulu: nama tidak kosong, harga angka dan ≥ 0, jumlah bilangan bulat ≥ 1.
- Kalau lolos, subtotal = harga × jumlah, ditulis dengan format Rupiah.
- Validasi HTML (`required`, `min`) cuma membantu pengguna. Pemeriksaan PHP yang paling penting, karena orang bisa menipu browser.

### Mini Project
- Ada 2 bagian: **bagian otak** (PHP di atas: terima + periksa data) dan **bagian wajah** (HTML di bawah: tampilan).
- Ada 5 isian: nama, NIM, prodi, semester, email.
- Semua error ditampilkan sekaligus dalam daftar. Kalau benar semua, muncul ringkasan.
- Isian tidak hilang kalau ada error (aku isi ulang pakai `value="..."`).

### Eksperimen Mandiri (di `eksperimen.php`)
1. Rata-rata tiga nilai.
2. Cari nama di array lewat GET (tidak peduli huruf besar/kecil).
3. Function `formatRupiah()`.
4. Validasi NIM: hanya angka dan tepat 10 digit (aturan ini aku tetapkan sendiri).
5. Tombol Reset: `type="reset"` hanya mengembalikan isian di layar browser, **tanpa** bertanya ke server.
   Memproses ulang di server = form dikirim lagi ke PHP lalu PHP menjawab ulang.

## 6. Contoh Kasus Uji (Mini Project)

| No | Input | Hasil |
|----|-------|-------|
| Valid 1 | Nama: Andi, NIM: 2024010001, Prodi: Teknik Informatika, Semester: 3, Email: andi@mail.com | Ringkasan data tampil |
| Valid 2 | Nama: Siti, NIM: 2023020005, Prodi: Sistem Informasi, Semester: 14, Email: siti@kampus.ac.id | Ringkasan data tampil |
| Tidak valid 1 | Semua kosong, email "abc", semester kosong | Muncul 5 pesan error |
| Tidak valid 2 | Semester: 20, Email: andi@ | Muncul error semester dan email |

Uji tambahan keamanan: isi nama dengan `<script>alert(1)</script>` → tampil sebagai teks biasa, tidak dijalankan.

## 7. Jawaban Pertanyaan Evaluasi

1. **Client-side vs server-side:** client-side jalan di browser pengguna (HTML, CSS, JavaScript). Server-side jalan di server (PHP): menerima permintaan, memproses, lalu mengirim hasil ke browser.
2. **Kenapa harus lewat web server:** karena yang menjalankan kode PHP adalah server (PHP interpreter). Kalau file dibuka dengan klik dua kali, browser hanya menampilkan kode mentah, tidak menjalankannya.
3. **Fungsi `$`:** tanda bahwa itu variabel (nama kotak penyimpan data) di PHP.
4. **GET vs POST:** GET mengirim data lewat URL (kelihatan, cocok untuk pencarian). POST mengirim data lewat body permintaan (tidak muncul di URL, cocok untuk form). Keduanya tidak terenkripsi; pakai HTTPS.
5. **Validasi server-side:** karena validasi di browser bisa dilewati/dimatikan. Server harus tetap memeriksa agar data salah atau berbahaya tidak diproses.
6. **`htmlspecialchars()`:** mengubah karakter khusus HTML (`< > " '`) menjadi teks aman sehingga input pengguna tidak dijalankan sebagai HTML/script (mencegah XSS).
7. **Manfaat function:** kode bisa dipakai ulang, lebih rapi, mudah diperbaiki, dan mudah dibaca.

## 8. Screenshot
Ambil screenshot setiap latihan + hasil validasi form (data valid dan tidak valid), lalu simpan di folder `screenshot/`.
