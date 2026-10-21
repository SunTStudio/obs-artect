PANDUAN LEADERBOARD OBS: LOWER & UPPER
========================================
Paket berisi index.html, contoh_data.csv, dan panduan ini.

FORMAT DATA GOOGLE SHEETS
Sistem sekarang mendukung 2 jenis format di spreadsheet:

OPSI A: FORMAT KANAN-KIRI (Berdampingan)
Sistem mendukung format 2 tabel berdampingan dengan kolom pemisah:
Kolom A - D (Lower): Kelas | Nama Tim | Nilai | Waktu Selesai
Kolom E: [kosong]
Kolom F - I (Upper): Kelas | Nama Tim | Nilai | Waktu Selesai

Contoh Baris:
Lower | Tim Garuda | 1000 | 10:32 | | Upper | Tim Rajawali | 1200 | 10:28
Lower | Tim Elang  | 500  | 10:45 | | Upper | Tim Merpati  | 2050 | 10:39
Lower | Tim Cendrawasih | 700 | 10:41 | | Upper | Tim Jalak | 1000 | 10:47

(Catatan: Kolom "Kelas" juga boleh dihilangkan jika hanya menulis "Nama Tim | Nilai | Waktu Selesai").

OPSI B: FORMAT VERTIKAL (Format Asli)
Kelas | Nama Tim | Nilai | Waktu Selesai
Lower | Tim Garuda | 950 | 10:32
Upper | Tim Rajawali | 1200 | 10:28

LOWER = kelas 1–5 SD. UPPER = kelas 6 SD.
Setiap kelas merupakan kejuaraan terpisah dan memiliki ranking sendiri. Nilai tertinggi berada di posisi pertama. Jika nilai sama, tim dengan waktu selesai tercepat berada di posisi lebih tinggi. Jika nilai dan waktu sama, nama tim diurutkan alfabetis.

SETUP
1. Buat Google Sheets dengan kolom di atas.
2. Isi nama kelas konsisten dengan Lower atau Upper.
3. Pilih tombol Bagikan (Share) di kanan atas > Ubah ke "Siapa saja yang memiliki link" sebagai Pelihat (Viewer).
4. Salin link browser Google Sheets Anda (misal: https://docs.google.com/spreadsheets/d/.../edit).
5. Buka index.php. Cari:
   const SHEET_CSV_URL = "...";
   Tempelkan link Google Sheets tersebut di sana. Sistem otomatis mengubahnya ke endpoint real-time tanpa delay cache 5 menit.
6. Tes dengan membuka http://localhost:8000/. Periksa apakah dua kelompok muncul.
7. Di OBS: Sources > + > Browser > centang Local file > Browse > pilih index.html.
   Atur Width 1920 dan Height 1080, lalu OK. Letakkan di atas gameplay.

Overlay mengecek data setiap 5 detik dan mengurutkan nilai tertinggi di dalam kelas masing-masing. Maksimal 20 tim per kelas.
Publikasi CSV membuat tab itu dapat dilihat publik. Gunakan spreadsheet khusus skor tanpa informasi pribadi/rahasia.
Jika data gagal dimuat, cek URL CSV dan pastikan tab telah dipublikasikan. Jika file lokal bermasalah dengan akses jaringan/CORS pada OBS, gunakan endpoint/server lokal gratis sebagai alternatif.
